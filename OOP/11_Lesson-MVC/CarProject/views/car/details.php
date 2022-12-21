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
    <h1>DETAILS OF CAR WITH THE REGISTRATION ID: <?= $carObj->getRegistrationId() ?></h1>
    <table>
        <tr>
            <th>Registration ID</th>
            <th>Manufacturer</th>
            <th>Model</th>
            <th>Year</th>
        </tr>
        <tr>
            <td><?= $carObj->getRegistrationId() ?></td>
            <td><?= $carObj->getManufacturer() ?></td>
            <td><?= $carObj->getModel() ?></td>
            <td><?= $carObj->getYear() ?></td>
        </tr>
    </table>
</html>