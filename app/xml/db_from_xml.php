<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['xml_file'])) {
    $xml_file = $_FILES['xml_file']['tmp_name'];
    if (file_exists($xml_file)) {
        $xml = simplexml_load_file($xml_file);
        if ($xml) {
            try {
                $db = new mysqli('mysql:host=localhost;dbname=compose', 'admin', 'testpass');
                foreach ($xml->record as $record) {
                    $title = (string)$record->title;
                    $createDate = (string)$record->createDate;
                    $updateDate = !empty($record->updateDate) ? (string)$record->updateDate : null; 
                    $stmt = $db->prepare("INSERT INTO category (title) VALUES (?)");
                    $stmt->bind_param('s', $title);
                    $stmt->execute();
                }
                echo "Данные успешно импортированы в базу данных.";
            } catch (Exception $e) {
                echo 'Ошибка: ' . $e->getMessage();
            }
        } else {
            echo "Неверный формат XML-файла.";
        }
    } else {
        echo "XML-файл не найден.";
    }
    header('Location: ../main.php');
    
}
?>