$(document).ready(function () {
  let currentReceiverId = null;
  let isGroupChat = false;
  let autoReloadInterval = null;

  // --- USER CLICK EVENT ---
  $(".user")
    .off("click")
    .on("click", function () {
      currentReceiverId = $(this).data("user-id");
      isGroupChat = false;
      $("#receiver_id").val(currentReceiverId);
      $("#chat-header").text("Chatting with " + $(this).text().trim());

      // ✅ Load messages immediately
      loadMessages();

      // 🔁 Then handle marking as read in the background
      $.post(
        "mark_as_read.php",
        { receiver_id: currentReceiverId },
        "json"
      ).done(function (resp) {
        if (resp.success) {
          $(`.user[data-user-id='${currentReceiverId}'] sup`).remove();
          loadUnreadCounts();
        }
      });

      // Start auto-reload for new messages
      startAutoReload();
    });

  // --- GROUP CHAT BUTTON ---
  $("#group-chat-btn")
    .off("click")
    .on("click", function () {
      currentReceiverId = null;
      isGroupChat = true;
      $("#receiver_id").val("");
      $("#chat-header").text("Group Chat");
      loadMessages();
      loadUnreadCounts();

      // Start auto-reload for new messages in group chat
      startAutoReload();
    });

  // --- SEND MESSAGE FORM ---
  $("#message-form")
    .off("submit")
    .on("submit", function (e) {
      e.preventDefault();

      if (!isGroupChat && !currentReceiverId) {
        return alert("Please select a user to chat with.");
      }

      let formData = new FormData(this);
      if (isGroupChat) formData.append("group", 1);

      $.ajax({
        url: "send_message.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
      })
        .done(function (res) {
          if (res.success) {
            $("#message").val("");
            $("#file-upload").val("");
            loadMessages();
            loadUnreadCounts();
          } else {
            alert(res.error || "Failed to send message.");
          }
        })
        .fail(function () {
          alert("Server error. Please try again.");
        });
    });

  // --- LOAD MESSAGES ---
  function loadMessages() {
    let url = isGroupChat ? "get_group_messages.php" : "fetch_messages.php";
    let data = isGroupChat ? {} : { receiver_id: currentReceiverId };

    $("#messages").html('<p style="color:gray;">Loading messages...</p>');

    $.get(
      url,
      data,
      function (messages) {
        let html = "";
        if (!messages.length) {
          html = '<p style="color:gray;">No messages yet.</p>';
        } else {
          messages.forEach((msg) => {
            let isMine = msg.sender_id != currentReceiverId;
            let who = isMine ? "You" : msg.username;
            let cls = isMine ? "sent" : "received";

            html += `<div class="${cls}">
                     <strong>${who}:</strong> ${msg.message || ""}`;

            if (msg.file_path) {
              let ext = msg.file_path.split(".").pop().toLowerCase();
              if (["jpg", "jpeg", "png", "gif", "webp"].includes(ext)) {
                html += `<br><img src="${msg.file_path}" style="max-width:200px;">`;
              } else {
                html += `<br><a href="${msg.file_path}" download>Download File</a>`;
              }
            }

            html += `</div>`;
          });
        }

        $("#messages").html(html).scrollTop($("#messages")[0].scrollHeight);
      },
      "json"
    );
  }

  // --- LOAD UNREAD COUNTS ---
  function loadUnreadCounts() {
    $.get(
      "get_unread_counts.php",
      function (data) {
        $(".user").each(function () {
          let uid = $(this).data("user-id");
          let cnt = data[uid] || 0;
          $(this).find("sup").remove();
          if (cnt) $(this).append(`<sup style="color:red;">${cnt}</sup>`);
        });
      },
      "json"
    );
  }

  // --- START AUTO RELOAD ---
  function startAutoReload() {
    if (autoReloadInterval) clearInterval(autoReloadInterval);

    autoReloadInterval = setInterval(() => {
      if (isGroupChat || currentReceiverId) {
        loadMessages();
      }
    }, 2000); // reload every 5 seconds (adjust as needed)
  }

  // --- STOP AUTO RELOAD ---
  function stopAutoReload() {
    if (autoReloadInterval) clearInterval(autoReloadInterval);
  }

  // --- INITIAL LOAD ---
  loadUnreadCounts();

  // --- CLEAN UP ON PAGE CLOSE ---
  $(window).on("beforeunload", function () {
    stopAutoReload();
  });
});
