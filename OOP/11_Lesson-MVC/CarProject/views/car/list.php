<?php
declare(strict_types=1);
?>

<!DOCTYPE html>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }

    table {
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
    }

    th {
        background-color: #b4a1b4;
    }

    td {
        text-align: center;
    }

</style>
<html>
<h1>LIST OF CARS</h1>
<table>
    <tr>
        <th>Registration ID</th>
        <th>Manufacturer</th>
        <th>Model</th>
        <th>Year</th>
    </tr>
    <?php foreach ($cars as $car): ?>
        <tr>
            <td><?= $car->getRegistrationId() ?></td>
            <td><?= $car->getManufacturer() ?></td>
            <td><?= $car->getModel() ?></td>
            <td><?= $car->getYear() ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</html>