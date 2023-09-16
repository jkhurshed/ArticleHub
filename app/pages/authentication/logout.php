<?php
if(isset($_GET["logout"])) {
    if (session_id() == "") {
        session_start();
    }
    unset($_SESSION["id"]);
    unset($_SESSION["id"]);
    unset($_SESSION["login"]);
    header("Location: login.php");
}
?>
<a href="?logout">Logout</a>
