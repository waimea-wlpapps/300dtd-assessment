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
// Checks if they're logged in and admin
$isloggedIn = $_SESSION['user']['loggedIn'] ?? false ;
$isAdmin = $_SESSION['user']['admin']       ?? false ;
$isManager = $_SESSION['user']['manager']       ?? false ;
//If they're logged in and have certain permissions load these functions
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
//Displays the users shift
    if (!$isManager && !$isAdmin){
        require_once 'lib/db.php';
$isloggedIn = $_SESSION['user']['loggedIn'] ?? false ;
$db = connectToDB();
        $name = $_SESSION['user']['username'];
        $user_id = $_SESSION['user']['id'];
        $forename = $_SESSION['user']['forename'];
        $surname = $_SESSION['user']['surname'];

        
        $query = 'SELECT shift, user, id FROM shifts WHERE user = :user_id';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $shifts = $stmt->fetchAll();
        
        echo '<h1>User ID: ' .$user_id. '</h1>';
        echo '<h1>Name: ' . $forename . " " . $surname.  '</h1>';
        
        
        if (empty($shifts)) {
            echo '<h2>No shifts found for:  '. $forename. ' ' . $surname . ': User ID: ' . $user_id . '</h2>';
        } else {
            echo '<ul>';
            foreach ($shifts as $shift) {
                echo '<li><h5>Current Shift: '. $shift['shift'] . '</li>';
            }
            echo '</ul>';
        }
    }

}
else {
    echo '<h1>Hello, Guest!</h1>';
    echo '<p>Please Login or Contact Manager for you Login Details.</p>';
    echo '<p><a href="login"><input type="submit" value="Login to account Here"</a></p>';

}


?>
</body>
</html>
