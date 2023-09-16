<?php
// Start a session
session_start();

require_once('../../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fio = $_POST['fio'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (fio, login, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssss", $fio, $login, $email, $password);
    
    if ($stmt->execute()) {
        header("location: login.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
 else {
    // If the form wasn't submitted, redirect to the registration form
    header("Location: register.php");
    exit();
}
?>
