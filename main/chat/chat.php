<?php
session_start();
require_once 'db_config.php';

if (!isset($_SESSION['userid']) || !isset($_SESSION['username'])) {
  header(header: "Location: main.php");
  exit;
}

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

$query = "
    SELECT u.userid, u.username, COUNT(m.id) AS unread_count 
    FROM usertb u 
    LEFT JOIN messages m ON (m.receiver_id = '$userid' AND m.sender_id = u.userid AND m.is_read = 0)
    WHERE u.userid != '$userid'
    GROUP BY u.userid, u.username
";
$result = mysqli_query($con, $query);

// Check for query errors
if (!$result) {
  echo "Error fetching users: " . mysqli_error($con);
  exit;
}
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Chat Section</title>
  <link rel="stylesheet" href="chatcss/login.css">
  <link rel="stylesheet" href="chatcss/chat.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0">
</head>


<body>
  <div class="box">

    <aside class="sidebar">
      <header class="sidebar-header" style=" background-color: black;">

        <button class="toggler sidebar-toggler">
          <span class="material-symbols-rounded">chevron_left</span>
        </button>

        <button class="toggler menu-toggler">
          <span class="material-symbols-rounded">menu</span>
        </button>

      </header>
      <nav class="sidebar-nav">
        <ul class="nav-list primary-nav">

          <li class="nav-item">
            <a href="../main/index.php?page=branch-analysis" class="nav-link ">
              <i class="fa-solid fa-backward"></i>
              <span class="nav-label"> Back to Home </span>
            </a>
            <span class="nav-tooltip"> Back to Home </span>
          </li>
        </ul>
      </nav>
    </aside>
  </div>

  <div id="user-list">
    <h3>Users</h3>
    <input type="text" id="user-search" placeholder="Search users..." />
    <?php foreach ($users as $user): ?>
      <div class="user" data-user-id="<?php echo $user['userid']; ?>" style="font-weight: bold;">
        <?php echo htmlspecialchars($user['username']); ?>
        <?php if ($user['unread_count'] > 0): ?>
          <sup style="color: red;"><?php echo $user['unread_count']; ?></sup>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>

  <div id="chat-window">
    <div id="chat-header-container">
      <h2 id="chat-header">Select a user to chat</h2>
      <button id="delete-messages-btn">
        <i class="fa-solid fa-trash" title="Delete All Messages"></i>
      </button>
    </div>
    <div id="messages"></div>

    <!-- Trash Icon for Deleting All Messages -->


    <form id="message-form" class="angat" enctype="multipart/form-data">
      <input type="hidden" id="receiver_id" name="receiver_id">

      <!-- File upload icon button -->
      <label for="file-upload" class="file-upload-label">
        <i class="fa-solid fa-paperclip"></i>
      </label>
      <input type="file" id="file-upload" name="file" style="display: none;" title="send a file" />

      <input type="text" id="message" name="message" placeholder="Type your message...">
      <button type="submit">Send</button>
    </form>
  </div>
  </div>

  <?php mysqli_close($con); ?>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="chatjs/js.js"></script>
  <script src="chatjs/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    $(document).ready(function () {
      // Handle file upload and preview
      $('#file-upload').on('change', function () {
        const file = this.files[0];
        const messageInput = $('#message');

        if (file) {
          const fileType = file.type.split('/')[0]; // Get the type of the file (image or other)
          const fileName = file.name;

          if (fileType === 'image') {
            const reader = new FileReader();
            reader.onload = function (e) {
              messageInput.val(''); // Clear the input
              messageInput.css('background-image', 'url(' + e.target.result + ')'); // Set background image
              messageInput.css('background-size', 'cover'); // Cover the input area
            }
            reader.readAsDataURL(file);
          } else {
            messageInput.val(fileName); // Set the filename in the input
            messageInput.attr('placeholder', ''); // Clear placeholder
          }
        }
      });

      // Handle message form submission
      $('#message-form').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        // Handle sending the message and file here
        // After sending, clear the input and reset styles
        $('#message').val('').css('background-image', 'none'); // Clear input and background
        $('#file-upload').val(''); // Clear file input
      });

      // Handle user search
      $('#user-search').on('input', function () {
        var searchValue = $(this).val().toLowerCase(); // Get the search input value
        $('.user').each(function () {
          var userName = $(this).text().toLowerCase(); // Get the username
          if (userName.includes(searchValue)) {
            $(this).show(); // Show the user if it matches the search
          } else {
            $(this).hide(); // Hide the user if it doesn't match
          }
        });
      });

      // Handle delete messages button
      $('#delete-messages-btn').on('click', function () {
        var receiverId = $('#receiver_id').val(); // Get the receiver ID
        if (!receiverId) {
          Swal.fire({
            icon: 'warning',
            title: 'No user selected',
            text: 'Please select a user to delete messages.'
          });
          return;
        }

        Swal.fire({
          title: 'Are you sure?',
          text: "Do you want to delete all messages with this user?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete them!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: 'delete_messages.php', // URL to the PHP script that will handle deletion
              type: 'POST',
              data: {
                receiver_id: receiverId
              }, // Send the receiver ID to the server
              success: function (response) {
                var jsonResponse = JSON.parse(response);
                if (jsonResponse.success) {
                  Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: jsonResponse.message
                  });
                  $('#messages').empty(); // Clear the messages displayed
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: jsonResponse.message
                  });
                }
              },
              error: function () {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'An error occurred while trying to delete messages.'
                });
              }
            });
          }
        });
      });
    });
  </script>
</body>

</html>