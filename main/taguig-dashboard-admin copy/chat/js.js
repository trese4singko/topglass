$(document).ready(function () {
    let currentReceiverId = null;
    let isGroupChat = false;
  
    // Select user and start chat
    $(".user").click(function () {
      currentReceiverId = $(this).data("user-id");
      isGroupChat = false;
      $("#receiver_id").val(currentReceiverId);
      $("#chat-header").text("Chatting with " + $(this).text());
  
      // Mark messages as read in the database
      $.post("mark_as_read.php", { receiver_id: currentReceiverId }, function (response) {
        if (response.success) {
          $(".user[data-user-id='" + currentReceiverId + "']").find("sup").remove();
          loadMessages();
        }
      }, "json");
    });
  
    // Group chat button
    $("#group-chat-btn").click(function () {
      currentReceiverId = null;
      isGroupChat = true;
      $("#receiver_id").val("");
      $("#chat-header").text("Group Chat");
      loadMessages();
    });
  
    // Send message
    $("#message-form").submit(function (e) {
      e.preventDefault();
      if (!isGroupChat && !currentReceiverId) {
        alert("Please select a user to chat with.");
        return;
      }
  
      let formData = $(this).serialize();
      if (isGroupChat) formData += "&group=1";
  
      $.post("send_message.php", formData, function (response) {
        if (!response.error) {
          $("#message").val("");
          loadMessages();
          loadUnreadCounts(); // Update unread counts after sending
        }
      }, "json");
    });
  
    // Load messages dynamically
    function loadMessages() {
      let url = isGroupChat ? "get_group_messages.php" : "get_messages.php";
      let data = isGroupChat ? {} : { receiver_id: currentReceiverId };
  
      $.get(url, data, function (response) {
        try {
          let messages = JSON.parse(response);
          let messagesHtml = "";
  
          if (messages.length === 0) {
            messagesHtml = '<p style="color: gray;">No messages yet.</p>';
          } else {
            messages.forEach(function (message) {
              let sender = message.sender_id == currentReceiverId ? message.username : "You";
              messagesHtml += `<div class="${message.sender_id == currentReceiverId ? "received" : "sent"}">
                                  <strong>${sender}:</strong> ${message.message}
                               </div>`;
            });
          }
  
          $("#messages").html(messagesHtml);
          $("#messages").scrollTop($("#messages")[0].scrollHeight);
        } catch (e) {
          console.error("Error parsing response:", e, response);
        }
      });
    }
  
    // Load unread message counts
    function loadUnreadCounts() {
      $.get("get_unread_counts.php", function (response) {
        try {
          let unreadData = JSON.parse(response);
          $(".user").each(function () {
            let userId = $(this).data("user-id");
            let unreadCount = unreadData[userId] || 0;
  
            $(this).find("sup").remove();
            if (unreadCount > 0) {
              $(this).append(`<sup style="color: red;">${unreadCount}</sup>`);
            }
          });
        } catch (e) {
          console.error("Error parsing unread count response:", e, response);
        }
      });
    }
  
    // Auto-refresh messages and unread counts every 2 seconds
    setInterval(function () {
      loadMessages();
      loadUnreadCounts();
    }, 2000);
  });
  