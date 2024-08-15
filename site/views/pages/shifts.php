<?php 

require_once 'lib/db.php';
$isloggedIn = $_SESSION['user']['loggedIn'] ?? false ;
$db = connectToDB();

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $forename = $_GET['forename'];
    $surname = $_GET['surname'];
}

if ($user_id === 0) {
    echo 'No valid user provided.';
    exit;
}

$query = 'SELECT shift, user, id FROM shifts WHERE user = :user_id';
$stmt = $db->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$shifts = $stmt->fetchAll();

echo '<h1>User ID: ' .$user_id. '</h1>';
echo '<h1>Name: ' . $forename . " " . $surname.  '</h1>';



?>
<form method="GET" action="list-users">
    <input type="submit" value="Return to User List" id='$user_id'>
</form>

<form method="GET" action="addshift">
    <input type="submit" value="Add Shift">
</form>


<?php

if (empty($shifts)) {
    echo '<h2>No shifts found for:  '. $forename. ' ' . $surname . ': User ID: ' . $user_id . '</h2>';
} else {
    echo '<ul>';
    foreach ($shifts as $shift) {
        echo '<li>' . $shift['shift'] . ' - User ID: ' . $shift['user'] . '</li>';
        echo  '<a href="delete-shift?id=' . $shift['id'].'"
        onclick="return confirm(`Are you sure?`)"
        > Delete Shift,</a>';
    }
    echo '</ul>';
}
?>