<?php

require_once 'lib/db.php' ;
consoleLog($_POST, 'Form Data') ;

$user = $_POST['ID'] ;
$shift = $_POST['shift'] ;


$db = connectToDB() ;

// Add the user account into the Database
$query = 'INSERT INTO shifts (shift, user) VALUES(?, ?)' ;
$stmt = $db->prepare($query) ;
$stmt->execute([$shift, $user]) ;

echo '<h2>Shift created!</h2>' ;
echo '<p><a href="list-users    ">View Users!</a>' ;