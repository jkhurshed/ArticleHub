<?php
    include('../includes/db.php');
    $table_name = 'post';
    $stmt = $db->query('SELECT * FROM ' . $table_name);
    $unique_number = uniqid();
    $filename = $table_name . '_' . $unique_number . '.xml';
    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->setIndent(true);
    $xml->startDocument('1.0', 'UTF-8');
    $xml->startElement('data');
    while ($row = $stmt->fetch_assoc()) {
        $xml->startElement('record');
        $xml->writeAttribute('id', $row['id']);
        $xml->writeElement('title', $row['title']);
        $xml->writeElement('description', $row['description']);
        $xml->writeElement('text', $row['text']);
        $xml->writeElement('user_id', $row['user_id']);
        $xml->writeElement('category_id', $row['category_id']);
        $xml->writeElement('date_created', $row['date_created']);
        $xml->endElement(); 
    }
    $xml->endElement(); 
    $xml->endDocument();
    header('Content-type: application/xml');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    echo $xml->outputMemory();
    $db = null;

?>