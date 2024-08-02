<!-- Main navigation menu. Can add logic for user type / access -->
<?php 
    global $isLoggedIn;    
?>

<nav id="main-nav">

    <menu hx-boost="true">

        <li><a href="/home">Home</a>
        <?php if ($isLoggedIn): ?>

            <?php
            $isAdmin = $_SESSION['user']['admin']       ?? false ;
            $isManager = $_SESSION['user']['manager']       ?? false ;
                if ($isAdmin && !$isManager){
                    ?>
                     <li><a href="/list-users">User-list</a>
                     <?php
                }
            
                if ($isManager && !$isAdmin){
                    ?>
                     <li><a href="/list-users">User-list</a>
                     <?php
                }
                if ($isManager && $isAdmin){
                    ?>
                     <li><a href="/list-users">User-list</a>
                     <?php
                }
            ?>
        <li><a hx-post="/logout" href="/logout">Logout</a>
        
        <?php else: ?>
        <li><a href="/login">Login</a>

        <?php endif ?>

    </menu>

</nav>


<!-- Update the nav links -->
<script>configureNav();</script>