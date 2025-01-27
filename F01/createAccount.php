<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'olympics');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $phoneNumber = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Password standards
    $minLength = 8;
    $maxLength = 128;
    $requiresUppercase = '/[A-Z]/'; 
    $requiresLowercase = '/[a-z]/'; 
    $requiresNumeric = '/[0-9]/';  
    $requiresSpecialChar = '/[!@#$%^&*(),.?":{}|<>]/'; 

    // Check ng length
    if (strlen($password) < $minLength || strlen($password) > $maxLength) {
        die("Password must be between $minLength and $maxLength characters long.");
    }

    // Check ang complexity
    if (!preg_match($requiresUppercase, $password)) {
        die("Password must contain at least one uppercase letter.");
    }
    if (!preg_match($requiresLowercase, $password)) {
        die("Password must contain at least one lowercase letter.");
    }
    if (!preg_match($requiresNumeric, $password)) {
        die("Password must contain at least one numeric digit.");
    }
    if (!preg_match($requiresSpecialChar, $password)) {
        die("Password must contain at least one special character.");
    }

    if ($password !== $confirmPassword) {
        die("Passwords do not match!");
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Photo upload
    $photo = NULL;
    if (!empty($_FILES['photo']['name'])) {
        $photo = 'assets/' . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
    }

    // admin
    if (strpos($email, '@admin.com') !== false) {
        $stmt = $conn->prepare("
            INSERT INTO adminProfile (firstName, lastName, photo, dateOfBirth, gender, country, phoneNumber, email, password)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("sssssssss", $firstName, $lastName, $photo, $dob, $gender, $country, $phoneNumber, $email, $hashedPassword);
        
        if ($stmt->execute()) {
            echo "Admin account created successfully!";
            header("Location: ./adminSide/admin.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        // Insert
        $stmt = $conn->prepare("
            INSERT INTO users (firstName, lastName, photo, dateOfBirth, gender, country, phoneNumber, email, passWord)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("sssssssss", $firstName, $lastName, $photo, $dob, $gender, $country, $phoneNumber, $email, $hashedPassword);
        
        if ($stmt->execute()) {
            echo "User account created successfully!";
            header("Location: ./userSide/user.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
