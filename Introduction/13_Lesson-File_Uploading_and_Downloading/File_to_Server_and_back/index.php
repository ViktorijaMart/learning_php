<?php
$filesData = json_decode(file_get_contents('./data/filesdata.json'), true);

if (is_null($filesData)) {
    $filesData = [];
}
?>

<!DOCTYPE html>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    h1 {
        margin: 20px 10px;
    }

    p {
        margin-bottom: 5px;
    }

    .upload {
        margin-left: 10px;
    }

    .files {
        display: flex;
        flex-wrap: wrap;
    }

    .file {
        border: 1px solid black;
        width: 300px;
        max-width: 35%;
        padding: 12px;
        margin: 12px;
    }

    img {
        width: 100%;
    }

    .name {
        display: inline-block;
    }

    button {
        padding: 2px 5px;
    }

</style>
<html>
    <body>
            <h1>Upload file</h1>
            <form action="fileUpload.php" method="post" enctype="multipart/form-data" class="upload">
                <input type="file" name="my_file"/>
                <button type="submit">Upload</button>
            </form>
            <h1>Uploaded files</h1>
            <div class="files">
                <?php foreach ($filesData as $key => $fileData): ?>
                <div class="file">
                    <img src='<?= preg_replace('/[\\\[w]/', '', $fileData['path']) ?>'/>
                    <p class="name">Name: </p>
                    <a href="download.php?path=<?= $fileData['path'] ?>"
                       target="_new">
                            <?= $fileData['name'] ?>
                    </a>
                    <p>Size: <?= $fileData['size']/1000 ?> kB</p>
                    <p>Upload date: <?= $fileData['uploadDate'] ?></p>
                    <form method="POST" action="delete.php" >
                        <input type="hidden" name="id" value="<?= $key ?>" >
                        <button type="submit" class="delete">Delete</button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>
    </body>
</html>
