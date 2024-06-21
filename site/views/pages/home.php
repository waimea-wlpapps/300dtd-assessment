<?php 
    global $isLoggedIn;    
?>
    <menu hx-boost="true">

Hello this is the home page
<?php if ($isLoggedIn): ?>

<p> Hello Jimmy this is the home page </p>

<?php endif ?>

</menu>

