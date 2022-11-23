<?php

$flags = [
    'Lithuania' => ['yellow', 'green', 'red'],
    'Austria' => ['red', 'white', 'red'],
    'Gabon' => ['green', 'yellow', 'blue'],
    'Germany' => ['black', 'red', 'yellow'],
    'Hungary' => ['red', 'white', 'green'],
];

?>

<html>
<body>
<?php foreach ($flags as $name => $flag) { ?>
    <div>
        <h1> <?= $name; ?> </h1>
        <div style="border: 1px solid black; width: max-content">
            <?php foreach ($flag as $color) {?>
                <div style="width: 200px; height: 50px; background-color: <?= $color; ?>"></div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
</body>
</html>

