<?php
session_start();
include("../connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION['email'];
$stmt = $conn->prepare("SELECT photo, firstName, lastName FROM users WHERE email = ?");
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $photo = $user['photo']; 
    $firstName = $user['firstName'];
    $lastName = $user['lastName'];
} else {
    echo '<script>alert("User details not found!");</script>';
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Athlete Dashboard</title>
    <link rel="icon" href="./assets/olympicIcon.ico" type="icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"
                style="background-color: var(--primary-color); color: var(--background-color); height: 100vh;">
                <img class="olympicLogo d-none" id="olympicLogoImg" src="../assets/whiteOlympicLogo.png"
                    alt="olympicLogo" width="270" height="50">
                <!-- Profile Section -->
                <div class="profileSection text-center d-flex flex-column align-items-center mx-2 mt-4">
                    <img src="../assets/athletes/<?php echo $photo ? basename($photo) : 'default.jpg'; ?>"
                        alt="Profile Picture">
                    <div class="athleteName my-2" style="font-size: 20px;">
                        <b><?php echo $firstName . " " . $lastName; ?></b>
                    </div>
                    <div class="athleteSport mb-3" style="font-size: 14px; line-height: .05;">Basketball</div>
                    <button class="btnEdit px-4 py-1 d-none d-md-block">
                        Edit
                    </button>
                    <i class="fa-solid fa-pen d-block d-md-none mt-5" type="button"
                        style="font-size: 24px; color: #ffffff;"></i>
                </div>
                
                <!-- Navigation Section -->
                <div class="nav-section mt-5">
                    <div class="nav-item d-flex align-items-center px-3 active" data-target="dashboardSection">
                        <b>Dashboard</b>
                    </div>
                    <div class="nav-item d-flex align-items-center px-3" data-target="calendarSection">
                        <b>Calendar</b>
                    </div>
                    <div class="nav-item d-flex align-items-center px-3" data-target="healthSection">
                        <b>Health</b>
                    </div>
                    <div class="nav-item d-flex align-items-center px-3" data-target="performanceSection">
                        <b>Performance</b>
                    </div>
                    <div class="nav-item d-flex align-items-center px-3" data-target="settingsSection">
                        <b>Settings</b>
                    </div>
                </div>
            </div>

            <!-- Right Side Content -->
            <div class="col-md-9" id="rightSide">
                <div id="dashboardSection" class="section-content" style="display: block;">
                    <!-- Search Bar -->
                    <div class="search-bar d-flex align-items-center position-absolute top-0 end-0 m-5">
                        <i class="fa-solid fa-magnifying-glass mx-1"></i>
                        <input type="text" class="form-control" placeholder="Search Something...">
                    </div>
                    <h1 class="aboutTitle p-4 justify-content-start" style="margin-top: 100px;">DASHBOARD</h1>
                    <div class="row d-flex justify-content-start">
                        <div class="col-12 col-lg-4 col-md-6 mb-4">
                            <div class="card mb-3">
                                <div class="cardHeader p-2">Upcoming Training</div>
                                <div class="cardBody">
                                    <h5 class="cardTitle mt-3">5</h5>
                                    <p class="cardText">days to go!</p>
                                </div>
                            </div>
                        </div>


                        <div class="col-12 col-lg-4 col-md-6 mb-4">
                            <div class="card mb-3">
                                <div class="cardHeader p-2">Upcoming Competition</div>
                                <div class="cardBody">
                                    <h5 class="cardTitle mt-3">15</h5>
                                    <p class="cardText">days to go!</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 col-md-6 mb-4">
                            <div class="card mb-3">
                                <div class="cardHeader p-2">Notes</div>
                                <div class="fa-solid fa-pen position-absolute top-0 end-0 p-2"
                                    style="color: #ffffff; font-size: 24px; cursor: pointer;" data-bs-toggle="modal"
                                    data-bs-target="#notesModal">
                                </div>
                                <div class="cardBody">
                                    <p class="cardText">
                                    <ol class="list-group list-group-numbered">
                                        <li class="list-group-item" style="background-color: transparent;">A list item
                                        </li>
                                        <li class="list-group-item" style="background-color: transparent;">A list item
                                        </li>
                                        <li class="list-group-item" style="background-color: transparent;">A list item
                                        </li>
                                        <li class="list-group-item" style="background-color: transparent;">A list item
                                        </li>
                                    </ol>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 col-md-6 mb-4">
                            <div class="card mb-3">
                                <div class="cardHeader p-2">Recent Performance Results</div>
                                <div class="cardBody">
                                    <h5 class="cardTitle mt-3">3rd</h5>
                                    <p class="cardText">Place</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 col-md-6 mb-4">
                            <div class="card mb-3">
                                <div class="cardHeader p-2">Medals Earned</div>
                                <div class="cardBody">
                                    <h5 class="cardTitle mt-3">10</h5>
                                    <p class="cardText">medals</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 col-md-6 mb-4">
                            <div class="card mb-3">
                                <div class="cardHeader p-2">Meal of the Day</div>
                                <div class="cardBody">
                                    <h5 class="cardTitle mt-3" style="font-size: 32px;">Breakfast</h5>
                                    <p class="cardText">
                                    <ul class="list-group" style="font-size: 12px;">
                                        <li class="list-group-item" style="background-color: transparent;">
                                            <input class="form-check-input me-1" type="checkbox" value=""
                                                id="firstCheckbox" style="background-color: var(--primary-color);">
                                            <label class="form-check-label" for="firstCheckbox">Protein-Packed
                                                Omelette</label>
                                        </li>
                                        <li class="list-group-item" style="background-color: transparent;">
                                            <input class="form-check-input me-1" type="checkbox" value=""
                                                id="secondCheckbox" style="background-color: var(--primary-color);">
                                            <label class="form-check-label" for="secondCheckbox">Whole Grain Toast with
                                                Avocado</label>
                                        </li>
                                        <li class="list-group-item" style="background-color: transparent;">
                                            <input class="form-check-input me-1" type="checkbox" value=""
                                                id="thirdCheckbox" style="background-color: var(--primary-color);">
                                            <label class="form-check-label" for="thirdCheckbox">Fresh Fruit
                                                Salad</label>
                                        </li>
                                        <li class="list-group-item" style="background-color: transparent;">
                                            <input class="form-check-input me-1" type="checkbox" value=""
                                                id="fourthCheckbox" style="background-color: var(--primary-color);">
                                            <label class="form-check-label" for="fourthCheckbox">Greek Yogurt with Nuts
                                                and Seeds</label>
                                        </li>
                                        <li class="list-group-item" style="background-color: transparent;">
                                            <input class="form-check-input me-1" type="checkbox" value=""
                                                id="fifthCheckbox" style="background-color: var(--primary-color);">
                                            <label class="form-check-label" for="fifthCheckbox">Water</label>
                                        </li>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="calendarSection" class="section-content" style="display: none;">
                    <div class="container">
                        <h1 class="aboutTitle justify-content-start" style="margin-top: 100px;">CALENDAR</h1>
                        <h2 id="monthLabel" class="justify-content-start my-1"></h2>
                        <div id="calendar" class="mx-auto"></div>
                        <div class="calendar-navigation d-flex justify-content-between align-items-center">
                            <button id="prevMonth" class="btn px-4">Previous</button>
                            <button id="nextMonth" class="btn px-4">Next</button>
                        </div>
                    </div>
                </div>

                <!-- health -->
                <div class="container px-3 px-lg-5">
                    <div id="healthSection" class="section-content" style="display: none;">
                        <h1 class="aboutTitle py-5 justify-content-start" style="margin-top: 100px;">HEALTH</h1>
                        <div class="row g-4 justify-content-center">
                            <!-- Physical Health Metrics Card -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="healthCard text-center position-relative">
                                    <div class="healthBody d-flex justify-content-center align-items-center">
                                        <p class="healthTitle px-3 text-center" style="line-height: normal;">
                                            Physical Health <br> Metrics
                                        </p>
                                    </div>
                                    <i class="fa-solid fa-pen position-absolute bottom-0 end-0 m-3"
                                        style="color: #ffffff; font-size: 24px; cursor: pointer;" data-bs-toggle="modal"
                                        data-bs-target="#physicalHealthModal"></i>
                                </div>
                            </div>

                            <!-- Mental Health Card -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="healthCard text-center position-relative">
                                    <div class="healthBody d-flex justify-content-center align-items-center">
                                        <p class="healthTitle px-3 text-center" style="line-height: normal;">
                                            Mental <br> Health
                                        </p>
                                    </div>
                                    <i class="fa-solid fa-pen position-absolute bottom-0 end-0 m-3"
                                        style="color: #ffffff; font-size: 24px; cursor: pointer;" data-bs-toggle="modal"
                                        data-bs-target="#mentalHealthModal"></i>
                                </div>
                            </div>

                            <!-- Meal Plan Card -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="healthCard text-center position-relative">
                                    <div class="healthBody d-flex justify-content-center align-items-center">
                                        <p class="healthTitle px-3 text-center">
                                            Meal Plan
                                        </p>
                                    </div>
                                    <i class="fa-solid fa-pen position-absolute bottom-0 end-0 m-3"
                                        style="color: #ffffff; font-size: 24px; cursor: pointer;" data-bs-toggle="modal"
                                        data-bs-target="#mealPlanModal"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="performanceSection" class="section-content" style="display: none; margin-top: 100px;">
                    <!-- Search Bar -->
                    <div class="search-bar d-flex align-items-center position-absolute top-0 end-0 m-5">
                        <i class="fa-solid fa-magnifying-glass mx-1"></i>
                        <input type="text" class="form-control" placeholder="Search Something...">
                    </div>
                    <h1 class="aboutTitle p-2 justify-content-start">PERFORMANCE HISTORY</h1>
                    <div class="row d-flex justify-content-start">
                        <div class="col-12 col-lg-4 col-md-6 mb-4">
                            <div class="card mb-3 d-flex justify-content-center align-items-center">
                                <button class="btn btnAddEvent" data-bs-toggle="modal" data-bs-target="#addEventModal"
                                    style="font-size: 150px; width: 100%; height: 100%; border-radius: 20px; background-color: var(--secondary-color); color: var(--background-color)">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 col-md-6 mb-4">
                            <div class="card mb-3">
                                <div class="cardEvent p-3">Event Name</div>
                                <div class="cardEventBody p-3">
                                    <p class="cardTextDate">Date:</p>
                                    <p class="cardTextPlacement">Placement:</p>
                                    <p class="cardTextLocation">Location:</p>
                                    <p class="cardTextCategory">Category:</p>
                                </div>
                                <i class="fa-solid fa-pen position-absolute bottom-0 end-0 m-3"
                                    style="color: #000000; font-size: 24px; cursor: pointer;" data-bs-toggle="modal"
                                    data-bs-target="#mealPlanModal"></i>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 col-md-6 mb-4">
                            <div class="card mb-3">
                                <div class="cardEvent p-3">Event Name</div>
                                <div class="cardEventBody p-3">
                                    <p class="cardTextDate">Date:</p>
                                    <p class="cardTextPlacement">Placement:</p>
                                    <p class="cardTextLocation">Location:</p>
                                    <p class="cardTextCategory">Category:</p>
                                </div>
                                <i class="fa-solid fa-pen position-absolute bottom-0 end-0 m-3"
                                    style="color: #000000; font-size: 24px; cursor: pointer;" data-bs-toggle="modal"
                                    data-bs-target="#mealPlanModal"></i>
                            </div>
                        </div>


                        <div class="col-12 col-lg-4 col-md-6 mb-4">
                            <div class="card mb-3">
                                <div class="cardEvent p-3">Event Name</div>
                                <div class="cardEventBody p-3">
                                    <p class="cardTextDate">Date:</p>
                                    <p class="cardTextPlacement">Placement:</p>
                                    <p class="cardTextLocation">Location:</p>
                                    <p class="cardTextCategory">Category:</p>
                                </div>
                                <i class="fa-solid fa-pen position-absolute bottom-0 end-0 m-3"
                                    style="color: #000000; font-size: 24px; cursor: pointer;" data-bs-toggle="modal"
                                    data-bs-target="#mealPlanModal"></i>
                            </div>
                        </div>


                        <div class="col-12 col-lg-4 col-md-6 mb-4">
                            <div class="card mb-3">
                                <div class="cardEvent p-3">Event Name</div>
                                <div class="cardEventBody p-3">
                                    <p class="cardTextDate">Date:</p>
                                    <p class="cardTextPlacement">Placement:</p>
                                    <p class="cardTextLocation">Location:</p>
                                    <p class="cardTextCategory">Category:</p>
                                </div>
                                <i class="fa-solid fa-pen position-absolute bottom-0 end-0 m-3"
                                    style="color: #000000; font-size: 24px; cursor: pointer;" data-bs-toggle="modal"
                                    data-bs-target="#mealPlanModal"></i>
                            </div>
                        </div>


                        <div class="col-12 col-lg-4 col-md-6 mb-4">
                            <div class="card mb-3">
                                <div class="cardEvent p-3">Event Name</div>
                                <div class="cardEventBody p-3">
                                    <p class="cardTextDate">Date:</p>
                                    <p class="cardTextPlacement">Placement:</p>
                                    <p class="cardTextLocation">Location:</p>
                                    <p class="cardTextCategory">Category:</p>
                                </div>
                                <i class="fa-solid fa-pen position-absolute bottom-0 end-0 m-3"
                                    style="color: #000000; font-size: 24px; cursor: pointer;" data-bs-toggle="modal"
                                    data-bs-target="#mealPlanModal"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="settingsSection" class="section-content mb-5" style="display: none;">
                    <h1 class="aboutTitle mt-3">ACCOUNT SETTINGS</h1>
                    <div class="container" style="background-color: var(--background-color); border-radius: 10px;">
                        <div class="row">
                            <h4 class="settingsHeader mt-4 mb-4"><b>Profile Details</b></h4>

                            <!-- Left Column -->
                            <div class="col-md-5">
                                <form>
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control form-control-custom" id="firstName"
                                                placeholder="Enter first name">
                                            <button type="button" class="btn btn-link ml-2">
                                                <i class="fa fa-pencil fa-edit" type="button"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control form-control-custom" id="lastName"
                                                placeholder="Enter last name">
                                            <button type="button" class="btn btn-link ml-2">
                                                <i class="fa fa-pencil fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="birthday" class="form-label">Birthday</label>
                                        <input type="date" class="form-control" id="birthday">
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="d-flex">
                                            <input type="email" class="form-control form-control-custom" id="email"
                                                placeholder="Enter email" required>
                                            <button type="button" class="btn btn-link ml-2">
                                                <i class="fa fa-pencil fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <div class="d-flex">
                                            <input type="tel" class="form-control form-control-custom" id="phone"
                                                placeholder="Enter phone number">
                                            <button type="button" class="btn btn-link ml-2">
                                                <i class="fa fa-pencil fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="athleteSport" class="form-label">Sport</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control form-control-custom"
                                                id="athleteSport" placeholder="e.g. Basketball">
                                            <button type="button" class="btn btn-link ml-2">
                                                <i class="fa fa-pencil fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="athleteGender" class="form-label">Gender</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control form-control-custom"
                                                id="athleteGender" placeholder="e.g. Male">
                                            <button type="button" class="btn btn-link ml-2">
                                                <i class="fa fa-pencil fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="athleteCountry" class="form-label">Country</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control form-control-custom"
                                                id="athleteCountry" placeholder="e.g. Philippines">
                                            <button type="button" class="btn btn-link ml-2">
                                                <i class="fa fa-pencil fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6 profileColumn">
                                <div class="container mt-3 p-2"
                                    style="background-color: var(--primary-color); border-radius: 20px;">
                                    <div class="mb-3">
                                        <h5 class="text-light mx-2" style="font-size: 15px;"><b>Profile
                                                Picture</b></h5>
                                        <div class="profileSection2 d-flex align-items-center justify-content-center">
                                            <img src="../assets/carouselPic5.png" alt="Profile Picture"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%; margin: 10px;">

                                            <div class="d-flex align-items-center">
                                                <label for="formFile" class="btn btnForm mr-4">
                                                    <input class="form-control" type="file" id="formFile"
                                                        style="display: none;" onchange="updateFileName()">
                                                    <b>Upload Your Profile Photo</b>
                                                </label>

                                                <button class="btn btnDelete mx-2 py-1 px-3">
                                                    <b>Delete</b>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container mt-3 p-2 mx-auto passwordAndDeleteColumm">
                                    <div class="row">
                                        <div class="col-12 col-lg-5 m-1 p-3"
                                            style="background-color: var(--primary-color); border-radius: 20px;">
                                            <div class="mb-3">
                                                <h5 class="text-light" style="font-size: 15px;"><b>Change
                                                        Password</b>
                                                </h5>
                                                <p style="color: var(--background-color); font-size: 12px;">You
                                                    can
                                                    modify the password of your account.</p>
                                                <button class="btn btnForm w-100">
                                                    <b>Change Password</b>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-5  m-1 p-3"
                                            style="background-color: var(--primary-color); border-radius: 20px;">
                                            <div class="mb-3">
                                                <h5 class="text-light" style="font-size: 15px;"><b>Delete
                                                        Account</b>
                                                </h5>
                                                <p style="color: var(--background-color); font-size: 12px;">You
                                                    can
                                                    permanently delete your <br> account.</p>
                                                <button class="btn btnForm w-100">
                                                    <b>Delete Account</b>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="accountButtons" class="d-none mt-3">
                                <button class="btn btn-primary mb-2 mb-md-0 mx-md-2" id="uploadPhotoButton">Upload
                                    Profile Photo</button>
                                <button class="btn btn-secondary mb-2 mb-md-0 mx-md-2" id="changePasswordButton">Change
                                    Password</button>
                                <button class="btn btn-danger mx-md-2" id="deleteAccountButton">Delete Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Editable Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"
                style="background-color: var(--primary-color); color: var(--background-color); font-family: Arial, sans-serif;">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Athlete Information</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-rectangle-xmark" style="color: #ffffff; font-size: large;"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="athleteName" class="form-label">Athlete Name</label>
                            <input type="text" class="form-control" id="athleteName" placeholder="Abuleigh">
                        </div>
                        <div class="mb-3">
                            <label for="athleteSport" class="form-label">Sport</label>
                            <input type="text" class="form-control" id="athleteSport" placeholder="Sports">
                        </div>
                        <div class="mb-3">
                            <label for="athleteImage" class="form-label">Athlete Image</label>
                            <input type="file" class="form-control" id="athleteImage">
                        </div>
                        <div class="mb-3">
                            <label for="athleteBirthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="athleteBirthday">
                        </div>
                        <div class="mb-3">
                            <label for="athleteEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="athleteEmail">
                        </div>
                        <div class="mb-3">
                            <label for="athletePhone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="athletePhone">
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn updateBtn me-2">Update</button>
                    <button type="button" class="btn doneBtn me-2" data-bs-dismiss="modal">Done</button>
                    <button type="button" class="btn deleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Physical Health Metrics Modal -->
    <div class="modal fade" id="physicalHealthModal" tabindex="-1" aria-labelledby="physicalHealthModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="physicalHealthModalLabel">Physical Health Metrics</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Injury Status</th>
                            <td><input type="text" class="form-control" placeholder="Yes/No, and details if Yes"></td>
                        </tr>
                        <tr>
                            <th>Heart Rate</th>
                            <td><input type="text" class="form-control" placeholder="Enter heart rate"></td>
                        </tr>
                        <tr>
                            <th>Blood Pressure</th>
                            <td><input type="text" class="form-control" placeholder="Enter blood pressure"></td>
                        </tr>
                        <tr>
                            <th>Oxygen Saturation</th>
                            <td><input type="text" class="form-control" placeholder="Enter oxygen saturation">
                            </td>
                        </tr>
                        <tr>
                            <th>Height</th>
                            <td><input type="text" class="form-control" placeholder="Enter height"></td>
                        </tr>
                        <tr>
                            <th>Weight</th>
                            <td><input type="text" class="form-control" placeholder="Enter weight"></td>
                        </tr>
                        <tr>
                            <th>Blood Type</th>
                            <td><input type="text" class="form-control" placeholder="Enter blood type"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mental Health Modal -->
    <div class="modal fade" id="mentalHealthModal" tabindex="-1" aria-labelledby="mentalHealthModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mentalHealthModalLabel">Mental Health</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Mood Tracking</th>
                            <td>
                                <select class="form-select">
                                    <option value="happy" style="background-color: #ffff00;">Happy</option>
                                    <option value="stressed" style="background-color: #ff0000;">Stressed
                                    </option>
                                    <option value="neutral" style="background-color: #cccccc;">Neutral</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Meal Plan Modal -->
    <div class="modal fade" id="mealPlanModal" tabindex="-1" aria-labelledby="mealPlanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mealPlanModalLabel">Meal Plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Breakfast</th>
                            <td><input type="text" class="form-control" placeholder="Enter breakfast details">
                            </td>
                        </tr>
                        <tr>
                            <th>Lunch</th>
                            <td><input type="text" class="form-control" placeholder="Enter lunch details"></td>
                        </tr>
                        <tr>
                            <th>Dinner</th>
                            <td><input type="text" class="form-control" placeholder="Enter dinner details"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal for Adding Event -->
    <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="eventName" class="form-label">Event Name</label>
                            <input type="text" class="form-control" id="eventName" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="eventDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventPlacement" class="form-label">Placement</label>
                            <input type="text" class="form-control" id="eventPlacement">
                        </div>
                        <div class="mb-3">
                            <label for="eventLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="eventLocation">
                        </div>
                        <div class="mb-3">
                            <label for="eventCategory" class="form-label">Category</label>
                            <input type="text" class="form-control" id="eventCategory">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Event</button>
                </div>
            </div>
        </div>
    </div>

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