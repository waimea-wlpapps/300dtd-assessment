<?php

$isAdmin = $_SESSION['user']['admin'] ?? false;
if (!$isAdmin) header('location: home.php');

require_once 'lib/db.php' ;

consoleLog($_POST);

$id = $_GET['id'];

$db = connectToDB();

// $query = 'DELETE FROM shifts WHERE id = ? '; 

// try {
//     $stmt = $db ->prepare($query);
//     $stmt ->execute([$id]);
// }

// catch (PDOException $e) {
//     consoleLog($e->getMessage(), 'DB insert', ERROR);
//     die('There was an error');
// }
// echo '<h2>Shift Deleted!</h2>' ;
// echo '<p><a href="shifts?id=' . $id . '>"Return to shifts!</a></p>';

// // echo  '<a href="shifts?id=' . $user['id'] . '&forename='.$user['forename'] .'&surname='.$user['surname'] .'"
// // '.'Delete Shifts:</a>';
// // echo '</td>';

// echo '<p><a href="shifts?id="' . $id . '">View Users!</a>' ;

$query = 'DELETE FROM shifts WHERE id = ? '; 

try {
    $stmt = $db ->prepare($query);
    $stmt ->execute([$id]);
}

catch (PDOException $e) {
    consoleLog($e->getMessage(), 'DB insert');
    die('There was an error deleting shift');
}

header ('location: list-users');