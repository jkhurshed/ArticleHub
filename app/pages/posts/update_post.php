<?php
// подключение необходимых файлов обработчиков
include_once("../../includes/functions.php");
// include_once("session.php");
include_once("../../includes/db.php");

if (isset($_POST['id'])) $id = $_POST['id'];
if (isset($_POST['title'])) $title = $_POST['title'];
if (isset($_POST['description'])) $description = $_POST['description'];
if (isset($_POST['text'])) $text = $_POST['text'];
if (isset($_POST['user_id'])) $user_id = $_POST['user_id'];
if (isset($_POST['category_id'])) $category_id = $_POST['category_id'];

if (!empty($title)) {
    try {

        $query = "UPDATE post SET title = ?, description = ?, text = ?, user_id = ?, category_id = ? WHERE id = ?";

        $sql = $db->prepare($query);
        $sql->bind_param("sssiii", $title, $description, $text, $user_id, $category_id, $id);

        if ($sql->execute()) {
            header('Location: post.php');
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