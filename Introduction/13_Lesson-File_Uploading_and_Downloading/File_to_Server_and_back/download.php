<?php
if (isset($_GET['path'])) {
    $file = $_GET['path'];

    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=\"$file\"");
    header('Content-Length:' . filesize($file));
    readfile($file);

    die;
}
