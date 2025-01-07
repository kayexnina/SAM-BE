// Hamburger
function toggleNavbar() {
    const navbar = document.getElementById("navbarNav");
    navbar.classList.toggle("show");
}

//Theme
function changeMode() {
  const body = document.body;
  const themeIcon = document.getElementById("themeIcon");
  const logo = document.querySelector(".navbar-brand img"); 

  body.classList.toggle("dark-mode");

  if (body.classList.contains("dark-mode")) {
      themeIcon.classList.remove("fa-moon-o");
      themeIcon.classList.add("fa-sun-o");

      document.documentElement.style.setProperty('--background-color', '#000000');
      document.documentElement.style.setProperty('--primary-color', '#ffffff');

      logo.src = "./assets/whiteOlympicLogo.png";
  } else {
      themeIcon.classList.remove("fa-sun-o");
      themeIcon.classList.add("fa-moon-o");

      document.documentElement.style.setProperty('--background-color', '#ffffff');
      document.documentElement.style.setProperty('--primary-color', '#000000');

      logo.src = "./assets/olympicLogo.png";
  }
}

// Logo Change
window.addEventListener('scroll', function () {
  const navbar = document.querySelector('.navbar');
  const logo = document.querySelector(".navbar-brand img"); 
  
  if (navbar.classList.contains('scrolled')) {

      if (document.body.classList.contains("dark-mode")) {
          logo.src = "./assets/olympicLogo.png"; 
      } else {
          logo.src = "./assets/whiteOlympicLogo.png"; 
      }
  } else {

      if (document.body.classList.contains("dark-mode")) {
          logo.src = "./assets/whiteOlympicLogo.png"; 
      } else {
          logo.src = "./assets/olympicLogo.png"; 
      }
  }
});

window.onscroll = function () {
  const navbar = document.querySelector('.navbar');
  if (window.scrollY > 20) {  
      navbar.classList.add('scrolled');
  } else {
      navbar.classList.remove('scrolled');
  }
};

