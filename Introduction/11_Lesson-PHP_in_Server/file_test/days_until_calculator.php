<?php
$now = new DateTime();

echo 'Please Enter' . "\n";
$eventName = readline('Event: ');
$eventDate = readline('Event Date yyyy-mm-dd: ');

$diff = (new DateTime($eventDate))->diff($now);

echo 'Event ' . $eventName . ' is ' . $diff->days . ' days away';