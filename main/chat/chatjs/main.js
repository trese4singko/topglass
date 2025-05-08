const sidebar = document.querySelector(".sidebar");
const sidebarToggler = document.querySelector(".sidebar-toggler");
const h5 = document.querySelector(".sidebar-header h5");
const main = document.querySelector(".main");
const menuToggler = document.querySelector(".menu-toggler");

let collapsedSidebarWidth = "500px";
let fullSidebarWidth = "280px";
let collapsedSidebarHeight = "56px";
let fullSidebarHeight = "100vh";

sidebarToggler.addEventListener("click", () => {
  sidebar.classList.toggle("collapsed");

  h5.style.display = h5.style.display === "none" ? "block" : "none";

  if (!sidebar.classList.contains("collapsed")) {
    main.style.marginLeft = fullSidebarWidth; 
  } else {
    main.style.marginLeft = ""; 
  }
});


const toggleMenu = (isMenuActive) => {
  sidebar.style.height = isMenuActive
    ? `${sidebar.scrollHeight}px`
    : collapsedSidebarHeight; 
  menuToggler.querySelector("span").innerText = isMenuActive ? "close" : "menu"; 
};

menuToggler.addEventListener("click", () => {
  toggleMenu(sidebar.classList.toggle("menu-active"));
});

window.addEventListener("resize", () => {
  if (window.innerWidth >= 1024) {
    sidebar.style.height = fullSidebarHeight;
  } else {
    sidebar.classList.remove("collapsed");
    sidebar.style.height = "auto";
    toggleMenu(sidebar.classList.contains("menu-active"));
  }
});
