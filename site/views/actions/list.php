<?php

require_once 'lib/db.php' ;

// See if we have a filter set
$priorityFilter = $_GET['priority'] ?? false;
consoleLog($priorityFilter, 'Priority Filter');


$query = 'SELECT * FROM users ';

if ($priorityFilter) {
    $query .= 'WHERE priority = ? ';
    $data = [$priorityFilter];
}
else {
    $data = [];
}
