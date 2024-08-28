<?php

$isAdmin = $_SESSION['user']['admin'] ?? false;
if (!$isAdmin) header('location: home.php');

require_once 'lib/db.php' ;

consoleLog($_POST);

$id = $_GET['id'];
//Deletes the shift from the database
$db = connectToDB();
$query = 'DELETE FROM shifts WHERE id = ? '; 
//Try's it
try {
    $stmt = $db ->prepare($query);
    $stmt ->execute([$id]);
}
//Catch's if it breaks
catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB insert');
    die('There was an error deleting shift');
}

header ('location: list-users');