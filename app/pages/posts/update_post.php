<?php
// подключение необходимых файлов обработчиков
include_once("../../includes/functions.php");
// include_once("session.php");
include_once("../../includes/db.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    echo 'ok';
}
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    echo "ok";
}
if (isset($_POST['description'])) {
    $title = $_POST['description'];
    echo "ok";
}
if (isset($_POST['text'])) {
    $title = $_POST['text'];
    echo "ok";
}
if (isset($_POST['user_id'])) {
    $title = $_POST['user_id'];
    echo "ok";
}
if (isset($_POST['category_id'])) {
    $title = $_POST['category_id'];
    echo "ok";
}

if (!empty($title) && !empty($text)) {
    echo "okk";
    try {

        $query = "UPDATE post SET title = ?, description = ?, text = ?, user_id = ?, category = ? WHERE id = ?";

        $sql = $db->prepare($query);
        $sql->bind_param("sssii", $title, $description, $text, $user_id, $category_id);

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