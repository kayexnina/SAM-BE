<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $inputEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashedPassword = $user['passWord'];
        if (password_verify($inputPassword, $hashedPassword)) {
            $_SESSION['email'] = $inputEmail;
            header("Location: ./userSide/user.php");
            exit();
        } else {
            echo '<script>alert("Invalid password. Please try again!");</script>';
            echo '<script>window.location.href = "./userSide/user.php";</script>';
            exit();
        }
    } else {
        echo '<script>alert("Invalid email. Please try again!");</script>';
        echo '<script>window.location.href = "./userSide/user.php";</script>';
        exit();
    }
}
?>
