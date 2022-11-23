<?php ?>

<ul>
    <?php for($i=0; $i<=10; $i++):
    if ($i % 2 !== 0): ?>
    <li><?php echo $i; ?></li>
    <?php else: ?>
    <li><b style="font-size: 20px;"><?php echo $i; ?></b></li>
    <?php endif; endfor; ?>
</ul>



