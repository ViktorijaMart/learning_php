<?php ?>
<a href="index.php">Get back</a>
<?php
$uploadedFile = $_FILES['my_file'];
$uniqueFileName = uniqid() . '_' . $uploadedFile['name'];
$fileSavePath = './data/' . $uniqueFileName;
$tempFilePath = $uploadedFile['tmp_name'];
$allowedFileTypes = [
        'jpg',
        'png',
        'jpeg',
        'webp'
];

/* File validation */

/* Error uploading file */
if ($uploadedFile['error'] !== 0) {
    echo 'Error uploading file';
    die;
}

/* Check file's format */
$imageFileType = strtolower(pathinfo($fileSavePath, PATHINFO_EXTENSION));

if (!in_array($imageFileType, $allowedFileTypes)) {
    echo 'Sorry, only JPG and PNG are allowed.';
    die;
}

/* Check file's size */
if ($uploadedFile['size'] > 1000000) {
    echo 'Sorry, your file is to large. Allowed size is 1MB';
    die;
}

/* FILE UPLOAD */
move_uploaded_file($tempFilePath, $fileSavePath);

/* SAVE FILE'S METADATA */
$filesData = json_decode(file_get_contents('./data/filesdata.json'), true);

if (is_null($filesData)) {
    $filesData = [];
}

$filesData[] = [
    'name' => $uploadedFile['name'],
    'uniqueName' => $uniqueFileName,
    'size' => $uploadedFile['size'],
    'path' => $fileSavePath,
    'uploadDate' => date('Y-m-d H:i:s')
];

file_put_contents('./data/filesdata.json',json_encode($filesData, JSON_PRETTY_PRINT));

header('Location: ./index.php');
die();


