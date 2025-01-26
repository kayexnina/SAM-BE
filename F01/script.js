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

//Navbar
window.onscroll = function () {
  const navbar = document.querySelector('.navbar');
  if (window.scrollY > 20) {  
      navbar.classList.add('scrolled');
  } else {
      navbar.classList.remove('scrolled');
  }
};

window.addEventListener('scroll', function () {
    var sections = document.querySelectorAll('section');
    var navLinks = document.querySelectorAll('.nav-link');
    
    sections.forEach(function (section, index) {
        var rect = section.getBoundingClientRect();
        if (rect.top <= 0 && rect.bottom > 0) {
            navLinks.forEach(function (link) {
                link.classList.remove('active');
            });
            navLinks[index].classList.add('active');
        }
    });
});

// modal
function toggleModal() { 
    const modalSignUp = document.getElementById('modalSignUp');
    const modalLogin = document.getElementById('modalLogin');
    const body = document.body;

    if (modalSignUp.style.display === 'flex' || modalLogin.style.display === 'flex') {
        modalSignUp.style.display = 'none';
        modalLogin.style.display = 'none';
        body.style.overflow = 'auto';  
    } else {
        modalSignUp.style.display = 'flex';
        body.style.overflow = 'hidden';  
    }
}

// Login Modal
function toggleLoginModal() {
    const modalSignUp = document.getElementById('modalSignUp');
    const modalLogin = document.getElementById('modalLogin');
    const body = document.body;
    body.style.overflow = 'hidden';
    modalLogin.style.display = 'flex';
    modalSignUp.style.display = 'none';
}

// Sign Up Modal
function toggleSignUpModal() {
    const modalSignUp = document.getElementById('modalSignUp');
    const modalLogin = document.getElementById('modalLogin');
    const body = document.body;
    body.style.overflow = 'hidden';
    modalSignUp.style.display = 'flex';
    modalLogin.style.display = 'none';
}

// Carousel
document.addEventListener('DOMContentLoaded', function () {
  const newsCarousel = new bootstrap.Carousel(document.getElementById('newsCarousel'), {
    ride: 'carousel', 
  });

  function toggleCarousel() {
    if (window.innerWidth <= 768) {
      newsCarousel.cycle();
    } else {
      newsCarousel.pause();
    }
  }

  window.addEventListener('resize', toggleCarousel);
  toggleCarousel();
});

  