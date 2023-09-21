<?php
    include('../includes.php');
    if (isset($_GET['post'])){
        $table_name = $_GET['post'];
    $stmt = $pdo->query('SELECT * FROM ' . $table_name);
    $unique_number = uniqid();
    $filename = $table_name . '_' . $unique_number . '.xml';
    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->setIndent(true);
    $xml->startDocument('1.0', 'UTF-8');
    $xml->startElement('data');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $xml->startElement('record');
        $xml->writeAttribute('id', $row['id']);
        $xml->writeElement('name', $row['name']);
        $xml->writeElement('createDate', $row['createDate']);
        $xml->writeElement('updateDate', $row['updateDate']);
        $xml->endElement(); 
    }
    $xml->endElement(); 
    $xml->endDocument();
    header('Content-type: application/xml');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    echo $xml->outputMemory();
    $pdo = null;
}
?>