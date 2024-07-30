<?php
require_once 'lib/db.php' ;
$db = connectToDB();

$query = 'SELECT * FROM shifts';
$stmt = $db->prepare($query);
$stmt->execute();
$shifts = $stmt ->fetchAll();


echo '<ul>';


foreach ($shifts as $shift) {
    echo '<li>';



    echo $shift['shift'];

    echo    '<input 
                type="hidden" 
                name="id" 
                value = "'. $shift['id'] . '"
                >';

    echo '</li>';
    
}
echo '</ul>';
