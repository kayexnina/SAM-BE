const navItems = document.querySelectorAll(".nav-item");
const sections = document.querySelectorAll(".section-content");

navItems.forEach((item) => {
  item.addEventListener("click", () => {
    sections.forEach((section) => {
      section.style.display = "none";
    });

    navItems.forEach((nav) => {
      nav.classList.remove("active");
    });

    const target = item.getAttribute("data-target");
    document.getElementById(target).style.display = "block";

    item.classList.add("active");
  });
});
