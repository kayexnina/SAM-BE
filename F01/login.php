<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];

    // Check the adminProfile table first
    $stmt = $conn->prepare("SELECT * FROM adminProfile WHERE email = ?");
    $stmt->bind_param("s", $inputEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Admin found
        $admin = $result->fetch_assoc();
        $hashedPassword = $admin['password']; 

        if (password_verify($inputPassword, $hashedPassword)) {
            $_SESSION['email'] = $inputEmail;
            $_SESSION['adminID'] = $admin['adminID'];

            header("Location: ./adminSide/admin.php");
            exit();
        } else {
            echo '<script>alert("Invalid password. Please try again!");</script>';
            echo '<script>window.location.href = "login.php";</script>';
            exit();
        }
    }

    // If not an admin, check the users table
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $inputEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found
        $user = $result->fetch_assoc();
        $hashedPassword = $user['passWord'];

        if (password_verify($inputPassword, $hashedPassword)) {
            $_SESSION['email'] = $inputEmail;
            $_SESSION['userID'] = $user['userID'];

            header("Location: ./userSide/user.php");
            exit();
        } else {
            echo '<script>alert("Invalid password. Please try again!");</script>';
            echo '<script>window.location.href = "login.php";</script>';
            exit();
        }
    } else {
        echo '<script>alert("Invalid email. Please try again!");</script>';
        echo '<script>window.location.href = "login.php";</script>'; 
        exit();
    }
}
?>
