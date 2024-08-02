<?php

require_once 'lib/db.php' ;
consoleLog($_POST, 'Form Data') ;

$user = $_POST['user'] ;
$pass = $_POST['pass'] ;
$sur = $_POST['surname'] ;
$fore = $_POST['forename'] ;


$db = connectToDB() ;

$query = 'SELECT * FROM users WHERE username = ?' ;
$stmt = $db ->prepare($query) ;
$stmt->execute([$user]) ;
$userData = $stmt ->fetch() ;

#Hash The Password supplied
$hash = password_hash($pass, PASSWORD_DEFAULT) ;

// Connect to the DB
consoleLog($userData) ;

// Add the user account
$query = 'INSERT INTO users (forename,surname,username,hash) VALUES(?, ?, ?, ?)' ;
$stmt = $db->prepare($query) ;
$stmt->execute([$fore, $sur, $user, $hash]) ;

echo '<h2>Account Created!</h2>' ;
echo '<p><a href="list-users    ">View Users!</a>' ;