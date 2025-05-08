const sidebar = document.querySelector(".sidebar");
const sidebarToggler = document.querySelector(".sidebar-toggler");
const h5 = document.querySelector(".sidebar-header h5");
const main = document.querySelector(".main");
const menuToggler = document.querySelector(".menu-toggler");

let collapsedSidebarWidth = "900px"; // Width of collapsed sidebar
let collapsedSidebarHeight = "56px"; // Height of collapsed sidebar
let fullSidebarHeight = "100vh"; // Height of expanded sidebar

// Event listener for the sidebar toggler
sidebarToggler.addEventListener("click", () => {
  // Toggle the collapsed class on the sidebar
  sidebar.classList.toggle("collapsed");

  // Toggle the visibility of the welcome text
  h5.style.display = h5.style.display === "none" ? "block" : "none";

  // Ensure the CSS of main remains unaffected
  if (!sidebar.classList.contains("collapsed")) {
    main.style.marginLeft = fullSidebarWidth; // Sidebar expanded
  } else {
    main.style.marginLeft = ""; // Sidebar collapsed: Reset to default CSS
  }
});

// Function to toggle the menu height for smaller screens
const toggleMenu = (isMenuActive) => {
  sidebar.style.height = isMenuActive
    ? `${sidebar.scrollHeight}px` // Expand the sidebar height
    : collapsedSidebarHeight; // Collapse the sidebar height
  menuToggler.querySelector("span").innerText = isMenuActive ? "close" : "menu"; // Update the icon text
};

// Event listener for the menu toggler
menuToggler.addEventListener("click", () => {
  toggleMenu(sidebar.classList.toggle("menu-active"));
});

// Handle responsive behavior on window resize
window.addEventListener("resize", () => {
  if (window.innerWidth >= 1024) {
    sidebar.style.height = fullSidebarHeight; // Ensure full height on larger screens
  } else {
    sidebar.classList.remove("collapsed"); // Reset collapsed state for smaller screens
    sidebar.style.height = "auto"; // Adjust height for smaller screens
    toggleMenu(sidebar.classList.contains("menu-active")); // Update menu state
  }
});
