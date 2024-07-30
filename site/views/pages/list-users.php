<?php

require_once 'lib/db.php' ;

$isAdmin = $_SESSION['user']['admin'] ?? false;
$isManager = $_SESSION['user']['manager'] ?? false;
if (!$isAdmin) {
    if(!$isManager)header('location: home.php');
}


$db = connectToDB();

$query = 'SELECT * FROM users';
$stmt = $db->prepare($query);
$stmt->execute();
$users = $stmt ->fetchAll();

echo '<h1>Users List </h1>';

echo '<table>';
echo '<tr>';
echo '<th>Username</th>';
echo '<th>Full Name</th>';
echo '<th>Delete User</th>';
echo '<th>Admin</th>';
echo '<th>Manager</th>';



foreach($users as $user) {
    echo '</tr>';
    echo '<td>';

    echo  '<a href="shifts"
    onclick="return confirm(`Viewing '. $user['username'] . 's profile`)"
>' . $user['username'] . ',</a>';
    echo '</td>';

    echo '<td>';

    echo '<p>' . $user['forename'] . ' ' . $user['surname'] .  ',</p>';
    echo '</td>';


    echo '<td>';

    echo  '<a href="delete-user?id=' . $user['id'] . '"
        onclick="return confirm(`Are you sure?`)"
        > Delete User,</a>';
        echo '</td>';
        echo '<td>';
        if(!$user['admin'])
    
            echo  '<a href="toggle-useradmin?id=' . $user['id'] . '"
            onclick="return confirm(`Are you sure?`)"
        > No,</a>';

    else 

     echo  '<a href="toggle-useradmin?id=' . $user['id'] . '"
        onclick="return confirm(`Are you sure?`)"
    > Yes,</a>';
    echo '</td>';
    echo '<td>';
    if(!$user['manager'])
        
    echo  '<a href="toggle-usermanager?id=' . $user['id'] . '"
    onclick="return confirm(`Are you sure?`)"
> No,</a>';

else 

echo  '<a href="toggle-usermanager?id=' . $user['id'] . '"
onclick="return confirm(`Are you sure?`)"
> Yes,</a>';
echo '</td>';


    echo '</tr>';

}
echo '</table>';
?>

<p><a href=home>Home</a>
