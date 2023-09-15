<?php
// подключение необходимых файлов обработчиков
include_once("../../includes/functions.php");
// include_once("session.php");
include_once("../../includes/db.php");

if (isset($_GET['id'])) $id = $_GET['id'];

if (!empty($id)) {

    try {

        $query = "DELETE FROM category WHERE id = ?";

        $sql = $db->prepare($query);
        $sql->bind_param("i", $id);

        $sql->execute();
        // $_SESSION['success'] = 'Категория успешна удалена.';
        
        $sql->close();
        $db->close();

        header('Location: category.php');
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>