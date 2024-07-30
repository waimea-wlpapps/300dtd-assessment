<?php 
    global $isLoggedIn;    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Security</title>
</head>
<body>

    

<?php

consoleLog($_SESSION, 'Session Data');

$isloggedIn = $_SESSION['user']['loggedIn'] ?? false ;
$isAdmin = $_SESSION['user']['admin']       ?? false ;
$isManager = $_SESSION['user']['manager']       ?? false ;

if ($isloggedIn) {
    $name = $_SESSION['user']['username'];
    echo '<h1>Welcome, ' .$name . '</h1>';
    if ($isAdmin){
        echo'<p>Welcome to the website</p>' ;
        echo'<p>You\'re currently signed in as an Admin</p>' ;


        echo '<p><a href="list-users">See all users</a></p>';
        echo '<p><a href="logout-user">Logout</a></p>';
    }

    if ($isManager){
        echo'<p>You\'re a Manager!!!</p>' ;

        echo '<p><a href="list-users">See all users</a></p>';
        echo '<p><a href="logout">Logout</a></p>';
    }

}
else {
    echo '<h1>Hello, Guest!</h1>';
    echo '<p>Please login or sign up for an account...</p>';
    echo '<p><a href="login">Login</a></p>';
    echo '<p><a href="signup">Sign Up</a></p>' ;
}


?>
</body>
</html>
