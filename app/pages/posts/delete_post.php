<?php
// подключение необходимых файлов обработчиков
include_once("../../includes/functions.php");
// include_once("session.php");
include_once("../../includes/db.php");

if (isset($_GET['id'])) $id = $_GET['id'];

if (!empty($id)) {

    try {

        $query = "DELETE FROM post WHERE id = ?";

        $sql = $db->prepare($query);
        $sql->bind_param("i", $id);

        if (!$sql->execute()) {
            throw new Exception("Error executing the query");
        }

        $sql->close();
        $db->close();

        header('Location: post.php');
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
