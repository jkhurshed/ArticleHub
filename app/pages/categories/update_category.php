<?php
// подключение необходимых файлов обработчиков
include_once("../../includes/functions.php");
// include_once("session.php");
include_once("../../includes/db.php");
?>
<?php
if (isset($_POST['id'])) $id = $_POST['id'];
if (isset($_POST['title'])) $title = $_POST['title'];

if (!empty($title)) {
    try {

        $query = "UPDATE category SET title = ? WHERE id = ?";

        $sql = $db->prepare($query);
        $sql->bind_param("si", $title, $id);

        if ($sql->execute()) {
            header('Location: category.php');
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