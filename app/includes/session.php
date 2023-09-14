<?php
if (session_id() == "") {
    session_start();
}
 
if (!isset($_SESSION["id"])) {
    header("Location: login_process.php");
    exit;
}
?>