<?php
$id = $_POST['id'];
$filesData = json_decode(file_get_contents('./data/filesdata.json'), true);
$filePath = $filesData[$id]['path'];

// DELETE FILE
unlink($filePath);

// DELETE FROM METADATA
unset($filesData[$id]);

file_put_contents('./data/filesdata.json', json_encode($filesData, JSON_PRETTY_PRINT));

header('Location: ./index.php');
die();