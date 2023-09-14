<?php
// Start a session
session_start();

require_once('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $fullname = $_POST['fio'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Server-side validation
    $errors = [];

    if (empty($fio)) {
        $errors[] = "Full name is required.";
    }

    if (empty($login)) {
        $errors[] = "Username is required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // If there are validation errors, display them and redirect back to the registration form
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: register.php");
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    // Modify this part to use your database connection and SQL query
    // Example:

    $query = "INSERT INTO users (fio, login, email, password) VALUES (:fio, :login, :email, :password)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':fio', $fio);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Registration successful. You can now log in.";
        header("Location: login_process.php");
        exit();
    } else {
        $_SESSION['errors'] = ["Registration failed. Please try again later."];
        header("Location: register.php");
        exit();
    }

} else {
    // If the form wasn't submitted, redirect to the registration form
    header("Location: register.php");
    exit();
}
?>
