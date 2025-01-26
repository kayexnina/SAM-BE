<?php
session_start();

include("connect.php");

$sql = "SELECT userID, firstName, lastName, photo FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Olympic Athlete Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body id="body" data-bs-theme="light">
    <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand mx-4" href="#">
                <img src="./assets/olympicLogo.png" alt="olympicLogo" width="210" height="40">
            </a>
            <button class="navbar-toggler" type="button" onclick="toggleNavbar()" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item px-4">
                        <a class="nav-link" href="#home"><b>Home</b></a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link" href="#about"><b>About</b></a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link" href="#athletes"><b>Athletes</b></a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link" href="#services"><b>Services</b></a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link" href="#news"><b>News</b></a>
                    </li>
                    <li>
                        <button class="btn px-4 me-5" onclick="changeMode()" type="button">
                            <i id="themeIcon" class="fa fa-moon-o" style="font-size:24px"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Home Page -->
    <section id="home">
        <div class="vidContainer overflow-hidden position-relative">
            <iframe class="video"
                src="https://www.youtube.com/embed/iVc61V4xhlw?autoplay=1&mute=1&controls=0&rel=0&disablekb=1&loop=1&playlist=iVc61V4xhlw"
                title="Paris 2024 Olympic Games | Official Trailer - BBC" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <div class="bannerColor"></div>
        </div>
    </section>

    <!-- About -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <h1 class="aboutTitle marginTop">ABOUT</h1>
                </div>

                <!-- Left Column -->
                <div class="col-lg-6 col-md-12 mb-4 d-flex justify-content-center" style="min-height: 620px;">
                    <div class="carouselImg">
                        <div id="carouselImgs" class="carousel slide h-100" data-bs-ride="carousel">
                            <div class="carousel-inner h-100">
                                <div class="carousel-item active h-100">
                                    <img src="assets/carouselPic1.jpg" class="d-block w-100 h-100" alt="olympicImage1"
                                        style="object-fit: cover; height: 300px;">
                                </div>
                                <div class="carousel-item h-100">
                                    <img src="assets/carouselPic2.jpg" class="d-block w-100 h-100" alt="olympicImage2"
                                        style="object-fit: cover; height: 300px;">
                                </div>
                                <div class="carousel-item h-100">
                                    <img src="assets/carouselPic3.jpg" class="d-block w-100 h-100" alt="olympicImage3"
                                        style="object-fit: cover; height: 300px;">
                                </div>
                                <div class="carousel-item h-100">
                                    <img src="assets/carouselPic4.jpg" class="d-block w-100 h-100" alt="olympicImage3"
                                        style="object-fit: cover; height: 300px;">
                                </div>
                                <div class="carousel-item h-100">
                                    <img src="assets/carouselPic5.png" class="d-block w-100 h-100" alt="olympicImage3"
                                        style="object-fit: cover; height: 300px;">
                                </div>
                                <div class="carousel-item h-100">
                                    <img src="assets/carouselPic6.png" class="d-block w-100 h-100" alt="olympicImage3"
                                        style="object-fit: cover; height: 300px;">
                                </div>
                                <div class="carousel-item h-100">
                                    <img src="assets/carouselPic7.png" class="d-block w-100 h-100" alt="olympicImage3"
                                        style="object-fit: cover; height: 300px;">
                                </div>
                                <div class="carousel-item h-100">
                                    <img src="assets/carouselPic8.jpg" class="d-block w-100 h-100" alt="olympicImage3"
                                        style="object-fit: cover; height: 300px;">
                                </div>
                                <div class="carousel-item h-100">
                                    <img src="assets/carouselPic9.jpg" class="d-block w-100 h-100" alt="olympicImage3"
                                        style="object-fit: cover; height: 300px;">
                                </div>
                                <div class="carousel-item h-100">
                                    <img src="assets/carouselPic10.jpg" class="d-block w-100 h-100" alt="olympicImage3"
                                        style="object-fit: cover; height: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="col-12 col-md-12 col-lg-6 d-flex mx-auto">
                    <div class="row d-flex align-items-stretch">
                        <!-- Purpose -->
                        <div class="col-12 col-md-12 col-lg-6 mb-4 d-flex">
                            <div class="infoBox">
                                <h4 class="mainTitle">Purpose</h4>
                                <p class="subtitle">Inspire human <br> potential every day</p>
                                <p class="details">Since ancient times, the Olympic Games have measured human potential
                                    —
                                    inspiring the best of us. Unlocking potential isn’t just for elite athletes chasing
                                    world records. Potential is inside everyone looking to get better — to be better —
                                    every
                                    single day.</p>
                            </div>
                        </div>

                        <!-- Vision -->
                        <div class="col-12 col-md-12 col-lg-6 mb-4 d-flex">
                            <div class="infoBox">
                                <h4 class="mainTitle">Vision</h4>
                                <p class="subtitle">Build a better world <br> through sport</p>
                                <p class="details">Sport can build friendships and bridge nations. Athletes are
                                    competitors,
                                    but respect each other in victory and defeat. Sport is a way in — a universal
                                    language
                                    accepted everywhere. It shows us we’re not that different after all.</p>
                            </div>
                        </div>

                        <!-- Positioning -->
                        <div class="col-12 col-md-12 col-lg-6 mb-4 d-flex">
                            <div class="infoBox">
                                <h4 class="mainTitle">Positioning</h4>
                                <p class="subtitle">Unite the world on and <br> off the field of play</p>
                                <p class="details">The Olympic Games are about bringing people together. Nations and
                                    generations of diverse backgrounds and beliefs. A celebration of what we share and
                                    the
                                    power of our differences. Faster. Higher. Stronger. Together.</p>
                            </div>
                        </div>

                        <!-- Values -->
                        <div class="col-12 col-md-12 col-lg-6 mb-4 d-flex">
                            <div class="infoBox">
                                <h4 class="mainTitle">Values</h4>
                                <p class="subtitle">Excellence, respect <br> and friendship</p>
                                <p class="details">Our values help bring out the best in us. We strive for excellence
                                    and
                                    encourage people to do the best they can. We promote respect in many different ways,
                                    respect for yourself, for the rules, for your opponents, for the environment, and
                                    for
                                    the public. We celebrate friendship, which is the hallmark of the Olympic Games.
                                    There
                                    is more that unites than divides us.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Athletes -->
    <section id="athletes">
        <div class="container">
            <div class="row">
                <h1 class="aboutTitle marginTop">ATHLETES</h1>
            </div>

            <div class="row my-4 d-flex justify-content-start">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-3 d-flex justify-content-center">
                        <div class="card m-3">
                            <img src="assets/athletes/<?php echo $row['photo'] ? basename($row['photo']) : 'default.jpg'; ?>"
                                class="card-img-top mx-auto mt-4" alt="Athlete Photo">
                            <div class="card-body d-flex flex-column align-items-center text-center">
                                <h5 class="cardTitle"><?php echo $row['firstName'] . ' ' . $row['lastName']; ?></h5>
                                <h4>Sports</h4>
                                <p class="cardText mx-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <button class="btnSeeMore text-center mx-auto mt-5" onclick="toggleModal()"><b>See more...</b></button>
            </div>


        </div>
    </section>


    <!-- Sign Up -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 mx-auto">
                <div class="modal modalSignUp" id="modalSignUp" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg" style="max-width: 800px; min-width: 300px;">
                        <h1 class="modalHeaderTitle d-flex justify-content-center align-items-center text-center">
                            BE AN ORGANIZED ATHLETE. BE ONE OF THEM.
                        </h1>

                        <div class="modal-content p-4" style="background-color: #ffffff; border-radius: 10px;">
                            <div class="modal-header border-0" style="position: relative;">
                                <button class="fa-solid fa-rectangle-xmark" onclick="toggleModal()"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3 class="text-start mb-3">Fill out this form.</h3>
                                <form action="createAccount.php" method="POST" enctype="multipart/form-data">
                                    <div class="row g-3">
                                        <div class="col-12 col-sm-6">
                                            <label for="firstName">First Name</label>
                                            <input type="text" id="firstName" name="firstName" class="form-control"
                                                required />
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" id="lastName" name="lastName" class="form-control"
                                                required />
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="photo">Photo (Optional)</label>
                                            <input type="file" id="photo" name="photo" class="form-control" />

                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="dob">Date of Birth</label>
                                            <input type="date" id="dob" name="dob" class="form-control" required />
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select name="gender" id="gender" class="form-select" required>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="X">LGBTQIA+</option>
                                                <option value="P">Prefer not to say</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="country">Country</label>
                                            <input type="text" id="country" name="country" class="form-control"
                                                required />
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="phone">Phone Number</label>
                                            <input type="tel" id="phone" name="phone" class="form-control" required />
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label for="email">Email Address</label>
                                            <input type="email" id="email" name="email" class="form-control" required />
                                        </div>
                                        <div class="col-12">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" name="password" class="form-control"
                                                required />
                                        </div>
                                        <div class="col-12">
                                            <label for="confirmPassword">Confirm Password</label>
                                            <input type="password" id="confirmPassword" name="confirmPassword"
                                                class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="submit" class="btnSignUp text-center">
                                            <b>Create Account</b>
                                        </button>
                                    </div>
                                </form>

                                <p class="text-center mt-3">
                                    <b>Have an account?</b>
                                    <a onclick="toggleLoginModal()" class="toggle-link"
                                        style="color: var(--primary-color);">Login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="container">
        <div class="modal modalLogin" id="modalLogin" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" style="max-width: 800px;">
                <div class="modal-content p-3" style="background-color: #ffffff; border-radius: 10px;">
                    <div class="modal-header border-0" style="position: relative;">
                        <button class="fa-solid fa-rectangle-xmark" onclick="toggleModal()" aria-label="Close"
                            style="position: absolute; top: 10px; right: 10px; color: #000000; font-size: 2rem; background: none; border: none;"></button>
                    </div>
                    <div class="modal-body">
                        <a class="col-12 d-flex justify-content-center mx-auto mb-2" href="#">
                            <img src="assets/olympicLogoNoName.png" alt="olympicLogo" width="450" height="80">
                        </a>

                        <h3 style="text-align: center; margin-bottom: 24px;">Login</h3>
                        <form action="login.php" method="POST" enctype="multipart/form-data">
                            <div class="form-container d-flex flex-wrap justify-content-center py-3" style="gap: 1rem;">
                                <div class="col-12 form-group" style="flex: 0 0 98%;">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" class="form-control" required />
                                </div>
                                <div class="col-12 form-group" style="flex: 0 0 98%;">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        required />
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btnLogin text-center">
                                    <b>Login</b>
                                </button>
                            </div>
                        </form>
                        <p class="text-center mt-3 login-link">
                            <b>Don't have an account?</b>
                            <a onclick="toggleSignUpModal()" class="toggle-link">Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Services -->
    <section id="services">
        <div class="container-fluid">
            <div class="row">
                <div class="col py-5 mt-5" style="background-color: var(--primary-color);">
                    <h1 class="aboutTitle text-light mb-3 text-center">OUR SERVICES</h1>
                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="d-flex flex-column align-items-center m-5">
                            <i class="fa-solid fa-calendar-days text-light" style="font-size: 7rem;"></i>
                            <span class="icon-label text-light text-center mt-1"> <b>Upcoming <br> Sessions</b></span>
                        </div>
                        <div class="d-flex flex-column align-items-center m-5">
                            <i class="fa-solid fa-hand-holding-heart text-light" style="font-size: 7rem;"></i>
                            <span class="icon-label text-light text-center mt-1"> <b>Current Health <br>
                                    Conditions</b></span>
                        </div>
                        <div class="d-flex flex-column align-items-center m-5">
                            <i class="fa-solid fa-person-running text-light" style="font-size: 7rem;"></i>
                            <span class="icon-label text-light text-center mt-1"><b>Performance <br> Results</b></span>
                        </div>
                        <div class="d-flex flex-column align-items-center m-5">
                            <i class="fa-solid fa-medal text-light" style="font-size: 7rem;"></i>
                            <span class="icon-label text-light text-center mt-1"><b>Achievements</b></span>
                        </div>
                        <div class="d-flex flex-column align-items-center m-5">
                            <i class="fa-solid fa-box text-light" style="font-size: 7rem;"></i>
                            <span class="icon-label text-light text-center mt-1"><b>Diet Meal</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Carousel -->
    <section id="news">
        <div class="container mt-3">
            <div class="row">
                <div class="col">
                    <h1 class="aboutTitle mt-5 pt-5">RECENT NEWS</h1>

                    <div id="newsCarousel" class="carousel slide mb-5 position-relative">
                        <!-- Carousel Items -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="card mx-auto mt-4"
                                    style="width: 100%; max-width: 40rem; background-color: white;">
                                    <img src="assets/carouselPic10.jpg" class="news-img-top" alt="newsPicture"
                                        style="border-radius: 10px; height: 60%; object-fit: cover;">
                                    <div class="card-body p-4">
                                        <h5 class="aboutTitle" style="color: var(--primary-color); font-size: 1.75rem;">
                                            HEADLINE</h5>
                                        <p class="newsText" style="font-style: normal">
                                            Some quick example text to build on the card title and make up the bulk of
                                            the
                                            card's content.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Another carousel item -->
                            <div class="carousel-item">
                                <div class="card mx-auto mt-4"
                                    style="width: 100%; max-width: 40rem; background-color: white;">
                                    <img src="assets/carouselPic5.png" class="news-img-top" alt="newsPicture"
                                        style="border-radius: 10px; height: 60%; object-fit: cover;">
                                    <div class="card-body p-4">
                                        <h5 class="aboutTitle" style="color: var(--primary-color); font-size: 1.75rem;">
                                            Another Headline</h5>
                                        <p class="newsText" style="font-style: normal">
                                            More example text for another card in the carousel.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev d-none d-md-block" type="button"
                            data-bs-target="#newsCarousel" data-bs-slide="prev">
                            <i class="fa-solid fa-circle-chevron-left control-icon"></i>
                        </button>
                        <button class="carousel-control-next d-none d-md-block" type="button"
                            data-bs-target="#newsCarousel" data-bs-slide="next">
                            <i class="fa-solid fa-circle-chevron-right control-icon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <div class="container-fluid mt-5 py-2" style="background-color: var(--primary-color);"></div>
    <footer class="container-fluid py-5 bg-light">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-center justify-content-center mb-4 mb-lg-0">
                <img src="assets/olympicLogo.png" alt="Olympic Logo" id="olympicLogo" class="img-fluid"
                    style="max-width: 400px; height: auto;">
            </div>
            <div class="col-lg-2 text-center text-lg-start" style="line-height: normal;">
                <h5 class="mb-3" style="font-size: 22px;"><b>Registered Office</b></h5>
                <p style="font-size: 15px;">
                    Maison Olympique<br>
                    1007 Lausanne<br>
                    Switzerland<br><br>
                    VAT & Company Identification Number<br><br>
                    CHE-106.029.126 TVA
                </p>
            </div>
            <div class="socialApp col-lg-4 text-center text-lg-start">
                <h5 class="mb-3" style="font-size: 22px;"><b>Socials</b></h5>
                <a href="#" target="_blank" class="me-3"><i class="fa-brands fa-youtube fa-2x"></i></a>
                <a href="#" target="_blank"><i class="fa-brands fa-twitter fa-2x"></i></a>
                <div class="mt-4">
                    <button class="btnContact text-center mt-3"><b>Contact Us</b></button>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="copyright text-center mt-4">
            © 2025 Kaye Niña Cristobal. All Rights Reserved.
        </div>
    </footer>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
        </script>

</body>

</html>