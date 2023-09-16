<?php
if (session_id() == "") {
    session_start();
}
 
if (!isset($_SESSION["id"])) {
    header("Location: ../pages/categories/category.php");
    echo "success!!!";
    exit;
}
?>
