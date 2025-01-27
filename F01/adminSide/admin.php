<?php
session_start();
include("../connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$adminEmail = $_SESSION['email'];
$stmt = $conn->prepare("SELECT photo, firstName, lastName FROM adminProfile WHERE email = ?");
$stmt->bind_param("s", $adminEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
    $photo = $admin['photo'] ?: '../assets/default-profile.png';
    $firstName = $admin['firstName'];
    $lastName = $admin['lastName'];
} else {
    echo '<script>alert("Admin details not found!");</script>';
    header("Location: ./index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="icon" href="./assets/olympicIcon.ico" type="icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
    <nav class="navbar sticky-top bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" href="#">
                <img src="../assets/olympicLogoNoName.png" alt="olympicLogo" width="290" height="50">
            </a>
        </div>
    </nav>

    <div class="container my-5" style="background-color: rgba(255, 255, 255, 0.65); border-radius: 20px;">
        <div class="row">
            <div class="col-md-4"
                style="background-color: var(--primary-color); color: var(--background-color); border-top-left-radius: 20px; border-bottom-left-radius: 20px;">
                <div class="profile-section d-flex align-items-center mx-2 mt-4">
                    <img src="../assets/<?php echo $photo ? basename($photo) : 'default.jpg'; ?>" alt="Profile Picture"
                        style="width: 50px; height: 50px; border-radius: 50%;">

                    <div class="adminName my-2 px-2" style="font-size: 16px; line-height: normal;">
                        <b><?php echo htmlspecialchars($firstName) . ' ' . htmlspecialchars($lastName); ?></b>
                        <div class="adminLabel d-flex align-items-center" style="font-size: 14px;">Admin</div>
                    </div>
                </div>

                <div class="task-section my-5 mx-3 py-4 px-3">
                    <h4 class="mb-4" style="font-size: 32px;">My Tasks</h4>
                    <ul class="list-unstyled">
                        <li><input type="checkbox"> Task Name 1</li>
                        <li><input type="checkbox"> Task Name 2</li>
                        <li><input type="checkbox"> Task Name 3</li>
                        <li><input type="checkbox"> Task Name 4</li>
                    </ul>
                </div>

                <div class="nav-section">
                    <div class="nav-item d-flex align-items-center px-3 active" data-target="athletesSection">
                        <b>Athletes</b>
                    </div>
                    <div class="nav-item d-flex align-items-center px-3" data-target="recentlyViewedSection">
                        <b>Recently Viewed</b>
                    </div>
                    <div class="nav-item d-flex align-items-center px-3" data-target="settingsSection">
                        <b>Settings</b>
                    </div>
                </div>
            </div>

            <div class="col-md-8" id="rightSide">
                <div id="athletesSection" class="section-content" style="display: block;">
                    <h1 class="aboutTitle mt-3"> ALL ATHLETES</h1>
                    <div class="row d-flex justify-content-start">
                        <?php
                        $query = "
                SELECT u.lastName, u.photo, a.sportDiscipline 
                FROM users u
                INNER JOIN athleticdetails a ON u.userID = a.userID
            ";
                        $athletesResult = $conn->query($query);

                        if ($athletesResult->num_rows > 0):
                            while ($athlete = $athletesResult->fetch_assoc()):
                                ?>
                                <div class="col-12 col-lg-4 col-md-6 mb-4 athleteCard">
                                    <div class="card" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <img src="../assets/athletes/<?php echo $athlete['photo'] ? basename($athlete['photo']) : 'default.jpg'; ?>"
                                            class="card-img-top mx-auto mt-4" alt="Athlete Profile Picture">
                                        <div class="card-body text-center">
                                            <h5 class="cardTitle mx-auto">
                                                <?php echo htmlspecialchars($athlete['lastName']); ?>
                                            </h5>
                                            <h4>
                                                <?php echo htmlspecialchars($athlete['sportDiscipline']) ?: 'N/A'; ?>
                                            </h4>
                                        </div>
                                        <div class="editIcon position-absolute top-0 end-0 p-2">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                        else:
                            ?>
                            <p class="text-center">No athletes found.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div id="recentlyViewedSection" class="section-content" style="display: none;">
                    <h1 class="aboutTitle mt-3"> HISTORY </h1>
                    <div class="row d-flex justify-content-start">
                        <?php
                        $query = "
                SELECT u.lastName, u.photo, a.sportDiscipline 
                FROM users u
                INNER JOIN athleticdetails a ON u.userID = a.userID
            ";
                        $athletesResult = $conn->query($query);

                        if ($athletesResult->num_rows > 0):
                            while ($athlete = $athletesResult->fetch_assoc()):
                                ?>
                                <div class="col-12 col-lg-4 col-md-6 mb-4 athleteCard">
                                    <div class="card" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <img src="../assets/athletes/<?php echo $athlete['photo'] ? basename($athlete['photo']) : 'default.jpg'; ?>"
                                            class="card-img-top mx-auto mt-4" alt="Athlete Profile Picture">
                                        <div class="card-body text-center">
                                            <h5 class="cardTitle mx-auto">
                                                <?php echo htmlspecialchars($athlete['lastName']); ?>
                                            </h5>
                                            <h4>
                                                <?php echo htmlspecialchars($athlete['sportDiscipline']) ?: 'N/A'; ?>
                                            </h4>
                                        </div>
                                        <div class="editIcon position-absolute top-0 end-0 p-2">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                        else:
                            ?>
                            <p class="text-center">No athletes found.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div id="settingsSection" class="section-content mb-5" style="display: none;">
                    <h1 class="aboutTitle mt-3">ACCOUNT SETTINGS</h1>
                    <div class="container" style="background-color: var(--background-color); border-radius: 10px;">
                        <div class="row">
                            <h4 class="mt-4 mb-4" style="font-size: 32px;"><b>Profile Details</b></h4>

                            <!-- Left Column -->
                            <div class="col-md-5">
                                <form>
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control form-control-custom" id="firstName"
                                                placeholder="Enter first name">
                                            <button type="button" class="btn btn-link ml-2">
                                                <i class="fa fa-pencil fa-edit"></i>
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
                                </form>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-7 d-none d-md-block">
                                <div class="container mt-3 p-2"
                                    style="background-color: var(--primary-color); border-radius: 20px;">
                                    <div class="mb-3">
                                        <h5 class="text-light mx-2" style="font-size: 15px;"><b>Profile Picture</b></h5>
                                        <div class="profile-section2 d-flex align-items-center justify-content-center">
                                            <img src="../assets/carouselPic5.png" alt="Profile Picture"
                                                style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; margin: 10px;">
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

                                <div class="container mt-3 p-2 mx-auto">
                                    <div class="row">
                                        <div class="col-5 m-1 p-3"
                                            style="background-color: var(--primary-color); border-radius: 20px;">
                                            <div class="mb-3">
                                                <h5 class="text-light" style="font-size: 15px;"><b>Change Password</b>
                                                </h5>
                                                <p style="color: var(--background-color); font-size: 12px;">You can
                                                    modify the password of your account.</p>
                                                <button class="btn btnForm w-100" style="font-size: 12px;">
                                                    <b>Change Password</b>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-5 m-1 p-3"
                                            style="background-color: var(--primary-color); border-radius: 20px;">
                                            <div class="mb-3">
                                                <h5 class="text-light" style="font-size: 15px;"><b>Delete Account</b>
                                                </h5>
                                                <p style="color: var(--background-color); font-size: 12px;">You can
                                                    permanently delete your account.</p>
                                                <button class="btn btnForm w-100" style="font-size: 12px;">
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
                            <input type="text" class="form-control" id="athleteName" placeholder="Name">
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