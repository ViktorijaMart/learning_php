<?php
$toDoJson = file_get_contents('./todo.json');

$toDoArray = json_decode($toDoJson, true);

if (is_null($toDoArray)) {
    $toDoArray = [];
} // Tam, kad foreach nemestu klaidos pirma kart atsidarius puslapi

?>

<!DOCTYPE html>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    input {
        height: 20px;
        padding: 2px;
    }

    button {
        height: 28px;
        padding: 0 8px;
    }

    fieldset {
        margin: 30px;
        padding: 20px;
    }

    .show__todo {
        margin-top: 20px;
    }

    li {
        list-style-type: none;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    li > p {
        width: 50%;
    }

    .to-do {
        font-weight: bold;
        font-size: 18px;
    }

    .created-at {
        text-align: end;
    }

    .due-date {
        margin: auto 0;
    }

    hr {
        margin-top: 2px;
        margin-bottom: 10px;
    }
</style>
<html>
    <body>
        <fieldset class="add__todo">
            <legend>New TODO</legend>
            <form method="post" action="ToDoSubmit.php">
                <input type="text" name="todo" placeholder="new task">
                <input type="date" name="date" >
                <input type="time" name="time" >
                <button type="submit">Submit</button>
            </form>
        </fieldset>
        <fieldset class="show__todo">
            <legend>TODOs</legend>
            <ul>
                <?php foreach ($toDoArray as $key => $todo): ?>
                <li>
                    <p class="to-do"><?= $todo['task'] ?></p>
                    <p class="created-at">Created at: <?= $todo['createdAt'] ?></p>
                    <p class="due-date">Due date: <?= $todo['dueDate'] ?></p>
                    <form method="POST" action="delete.php" >
                        <input type="hidden" name="id" value="<?= $key ?>" >
                        <button type="submit">Delete</button>
                    </form>
                </li>
                <hr/>
                <?php endforeach; ?>
            </ul>
        </fieldset>
    </body>
</html>
