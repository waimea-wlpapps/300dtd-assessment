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
    if ($isAdmin && !$isManager){
        echo'<p>Welcome to the website</p>' ;
        echo'<p>You\'re a System Admin</p>' ;



        echo '<a href="list-users"><input type ="submit" value="See all users"</a>';
        echo '<a hx-post="/logout"><input type="submit" value="Logout"</a>';
    }

    if ($isManager && !$isAdmin){
        echo'<p>You\'re a System Manager!!!</p>' ;

        echo '<a href="list-users"><input type ="submit" value="See all users"</a>';
        echo '<a hx-post="/logout"><input type="submit" value="Logout"</a>';
    }
    if ($isManager && $isAdmin){
        echo'<p>You\'re the owner!!!</p>' ;

        echo '<a href="list-users"><input type ="submit" value="See all users"</a>';
        echo '<a hx-post="/logout"><input type="submit" value="Logout"</a>';
    }

    if (!$isManager && !$isAdmin){
        echo '<a href="list-users"><input type ="submit" value="See all users"</a>';
    }

}
else {
    echo '<h1>Hello, Guest!</h1>';
    echo '<p>Please login or Contact your Manger for Login Details.</p>';
    echo '<p><a href="login"><input type="submit" value="Login Here"</a></p>';

}


?>
</body>
</html>
