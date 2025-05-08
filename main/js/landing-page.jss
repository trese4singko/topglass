
<script>
document.addEventListener("DOMContentLoaded", function() {
  const sessionToken = sessionStorage.getItem("session_token");

  // If session token is not present, stop execution
  if (!sessionToken) {
    return;
  }

  // --- Heartbeat: Keep session alive every 10 seconds ---
  setInterval(() => {
    fetch("heartbeat.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        token: sessionToken,
      }),
    }).catch((error) => {
      console.error("Heartbeat failed:", error);
    });
  }, 10000);

  // --- Inactivity Timer with SweetAlert2 ---
  let inactivityTime = 10 * 1000; // 2 minutes
  let warningTime = 1 * 1000; // 1 minute
  let inactivityTimeout, warningTimeout;

  // Function to reset both timers
  function resetInactivityTimer() {
    console.log("Resetting inactivity timer");

    clearTimeout(inactivityTimeout);
    clearTimeout(warningTimeout);

    // Start inactivity timeout
    inactivityTimeout = setTimeout(() => {
      console.log("Inactivity timeout reached, showing warning");
      showInactivityWarning();
    }, inactivityTime);
  }

  // Function to show SweetAlert2 warning
  function showInactivityWarning() {
    console.log("Inactivity warning should trigger now");

    Swal.fire({
      title: "You’ve been inactive",
      text: "You will be logged out soon due to inactivity.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Stay Logged In",
      cancelButtonText: "Logout Now",
      allowOutsideClick: false,
      allowEscapeKey: false,
      timer: warningTime,
      timerProgressBar: true
    }).then((result) => {
      if (result.isConfirmed) {
        console.log("User  chose to stay logged in.");
        resetInactivityTimer(); // Reset timer if user stays
      } else {
        console.log("User  chose to logout.");
        logoutUser(); // Logout if user chooses to logout
      }
    });

    // Force logout if no response within warning time
    warningTimeout = setTimeout(() => {
      console.log("No response within warning time, logging out.");
      logoutUser();
    }, warningTime);
  }

  // Function to handle logout
  function logoutUser() {
    console.log("User is being logged out due to inactivity.");
    window.location.href = "logout.php"; // Replace with your logout page
  }

  // Events that count as activity
  window.onload = resetInactivityTimer;
  document.onmousemove = resetInactivityTimer;
  document.onkeypress = resetInactivityTimer;
  document.onclick = resetInactivityTimer;
  document.onscroll = resetInactivityTimer;

  // Start the inactivity timer initially
  resetInactivityTimer();

  // --- Unload & Beforeunload Events ---
  window.addEventListener("beforeunload", (event) => {
    console.log("User is about to leave the page.");

    if (sessionToken) {
      // This will prevent the page unload and prompt the user
      event.preventDefault();
      event.returnValue = "You are about to be logged out due to inactivity."; // Standard browser message

      // Trigger actions before unload (using sendBeacon)
      const data = new Blob([JSON.stringify({
        token: sessionToken
      })], {
        type: "application/json"
      });

      // Send data to backend before unloading
      navigator.sendBeacon("auto_logout.php", data);
      navigator.sendBeacon("cleanup_sessions.php", data);
      navigator.sendBeacon("logout_on_browser_close.php", data);
    }
  });

  window.addEventListener("unload", () => {
    if (sessionToken) {
      console.log("Cleaning up session before unload");
      navigator.sendBeacon("logout_on_browser_close.php");
    }
  });
});
</script>