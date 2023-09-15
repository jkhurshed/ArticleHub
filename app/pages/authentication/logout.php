<?php
if(isset($_GET["logout"])) {
    if (session_id() == "") {
        session_start();
    }
    unset($_SESSION["id"]);
    unset($_SESSION["id"]);
    unset($_SESSION["login"]);
    header("Location:http://localhost:8080/login.php");
}
?>
<a href="?logout">Выйти</a>
