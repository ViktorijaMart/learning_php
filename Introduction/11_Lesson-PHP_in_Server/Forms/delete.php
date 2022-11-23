<?php

$todoArray = json_decode(file_get_contents('./todo.json'), true);

unset($todoArray[$_POST['id']]);

file_put_contents('./todo.json', json_encode($todoArray, JSON_PRETTY_PRINT));
?>

<p>Deleted successfully</p>
<a href="ToDo.php">Get back</a>

