<?php
if (session_id() == "") {
    session_start();
}
 
if (!isset($_SESSION["id"])) {
    header("Location:http://localhost:8080/category.php");
    exit;
}
?>
