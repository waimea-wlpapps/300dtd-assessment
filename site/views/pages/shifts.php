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

$query = 'SELECT shift, user FROM shifts WHERE user = :user_id';
$stmt = $db->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$shifts = $stmt->fetchAll();

echo '<h1>User ID: ' . $forename . " " . $surname.  '</h1>';



?>
<form method="GET" action="list-users">
    <input type="submit" value="Return to User List">
</form>

<form hx-post="/signup-user"
      hx-trigger="submit">

    <label>Forename</label>

    <input name="forename" type="text" required>

    <label>Surname</label>

    <input name="surname" type="text" required>

    <label>Username</label>

    <input name="user" type="text" required>

    <label>Password</label>

    <input name="pass" type="password" required>

    <input type="submit" value="signup-user">

</form>

<?php
if (empty($shifts)) {
    echo 'No shifts found for ' . $user['username'];
} else {
    echo '<ul>';
    foreach ($shifts as $shift) {
        echo '<li>' . $shift['shift'] . ' - User ID: ' . $shift['user'] . '</li>';
    }
    echo '</ul>';
}
?>