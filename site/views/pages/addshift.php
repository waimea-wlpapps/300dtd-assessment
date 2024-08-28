<?php
require_once 'lib/db.php';
$isloggedIn = $_SESSION['user']['loggedIn'] ?? false ;
$db = connectToDB();

?>

<!-- Form to add a shift  -->
<form hx-post="/add-shift"
      hx-trigger="submit">

    <label>User ID:</label>

    <input name="ID" type="text" required>
    <label>Shift Details:</label>

    <input name="shift" type="text" required>

    <input type="submit" value="add-shift">

</form>
