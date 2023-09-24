<?php
// подключение необходимых файлов обработчиков
include_once("../../includes/functions.php");
// include_once("session.php");
include_once("../../includes/db.php");

if (isset($_POST['id'])) $id = $_POST['id'];
if (isset($_POST['text'])) $text = $_POST['text'];
if (isset($_POST['user_id'])) $user_id = $_POST['user_id'];
if (isset($_POST['post_id'])) $post_id = $_POST['post_id'];

if (!empty($text)) {
    try {

        $query = "UPDATE comment SET text = ?, user_id = ?, post_id = ? WHERE id = ?";

        $sql = $db->prepare($query);
        $sql->bind_param("siii", $text, $user_id, $post_id, $id);

        if ($sql->execute()) {
            header('Location: comment.php');
        } else {
            echo "Error executing the query";
        }

        $sql->close();
        $db->close();

         } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>