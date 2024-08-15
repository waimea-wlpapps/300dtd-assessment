<?php

require_once 'lib/db.php' ;

$isAdmin = $_SESSION['user']['admin'] ?? false;
$isManager = $_SESSION['user']['manager'] ?? false;
if (!$isAdmin) {
    if(!$isManager)header('location: home');
}

 
$db = connectToDB();

$search = $_GET['search'] ?? '';

$query = 'SELECT * FROM users';
if ($search) {
    $query .= ' WHERE username LIKE :search OR forename LIKE :search OR surname LIKE :search';
}

$query = 'SELECT * FROM users';
$stmt = $db->prepare($query);
$stmt->execute();
$users = $stmt ->fetchAll();

echo '<h1> Add Employee </h1>';


echo '<form method="GET" action="signup">';
echo '<input type="submit" value="Add Employee">';
echo '</form>';

echo '<h1>Users List </h1>';

echo '<form method="GET" action="">';
echo '<input type="text" name="search" placeholder="Search Employee Full Name" value="' . ($search) . '">';
echo '<input type="submit" value="Search">';
echo '</form>';


echo '<table>';
echo '<tr>';
echo '<th>Username</th>';
echo '<th>Full Name</th>';
echo '<th>Shifts</th>';
echo '<th>Delete User</th>';
echo '<th>Admin</th>';
echo '<th>Manager</th>';

foreach($users as $user) {
    if ($search && stripos($user['forename'], $search) === false && stripos($user['surname'], $search) === false) {
        continue;
    }
    echo '</tr>';
    echo '<td>';

    echo '<p>' . $user['username'] . ',</p>';
    echo '</td>';

    echo '<td>';

    echo '<p>' . $user['forename'] . ' ' . $user['surname'] .  ',</p>';
    echo '</td>';

    echo '<td>';

    echo  '<a href="shifts?id=' . $user['id'] . '&forename='.$user['forename'] .'&surname='.$user['surname'] .'"
    onclick="return confirm(`Viewing '. $user['username'] . 's profile`)">
    '.'Edit Shifts:</a>';
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

echo '<form method="GET" action="home">';
echo '<input type="submit" value="Home">';
echo '</form>';
?>

