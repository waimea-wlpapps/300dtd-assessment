<!-- Main navigation menu. Can add logic for user type / access -->
<?php 
    global $isLoggedIn;    
?>

<nav id="main-nav">

    <menu hx-boost="true">

        <li><a href="/home">Home</a>
        <li><a href="/about">About</a>
        <?php if ($isLoggedIn): ?>

        <li><a hx-post="/logout" href="/logout">Logout</a>

        <?php else: ?>

        <li><a href="/login">Login</a>

        <?php endif ?>

    </menu>

</nav>


<!-- Update the nav links -->
<script>configureNav();</script>