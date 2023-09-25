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
        
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($sql)) {
            $sql->close();
        }
        if (isset($db)) {
            $db->close();
        }
        header('Location: category.php');
    }
}
?>
