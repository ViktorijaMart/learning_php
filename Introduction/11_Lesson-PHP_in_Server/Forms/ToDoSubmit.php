<?php

if (DateTime::createFromFormat('Y-M-j H:i:s', ($_POST['date'] . ' ' . $_POST['time'])) < new DateTime()): ?>
    <p>Task should have a future due date</p>
    <a href="ToDo.php">Get back</a>
    <?php die() ?>
<?php else: ?>
    <p>Task added successfully</p>
    <a href="ToDo.php">Get back</a>
<?php endif; ?>

<?php
$todoArray = json_decode(file_get_contents('./todo.json'), true);

if (is_null($todoArray)) {
    $todoArray = [];
} // kai json nieko nera ir is jo grazina null

$todoArray[] = [
    'task' => $_POST['todo'],
    'createdAt' => date('Y-m-d H:i'),
    'dueDate' => date($_POST['date'] . ' ' . $_POST['time'])
];

function sortTasks($a, $b) {
    if ($a['dueDate'] == $b['dueDate']) return 0;
    return (date_timestamp_get(date_create($a['dueDate'])) < date_timestamp_get(date_create($b['dueDate'])) ? -1 : 1);
}

if(!empty($todoArray)) {
    usort($todoArray, 'sortTasks');
}

file_put_contents('./todo.json', json_encode($todoArray, JSON_PRETTY_PRINT));

?>



