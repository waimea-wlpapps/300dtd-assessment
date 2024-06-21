<?php

//-------------------------------------------------------------
// Libraries
require_once 'lib/debug.php';
require_once 'lib/router.php';


//-------------------------------------------------------------
// Site Configuration
const SITE_NAME  = 'PHP Routing with HTMX';
const SITE_OWNER = 'Waimea College';

//-------------------------------------------------------------
// Setup a session
session_name('guest');
session_start();

//-------------------------------------------------------------
// Check which type of user we
$userName   = $_SESSION['user']['name']     ?? 'Guest';
$isLoggedIn = $_SESSION['user']['loggedIn'] ?? false;



//-------------------------------------------------------------
// Initialise the router
$router = new Router(['debug' => true]);


//-------------------------------------------------------------
// Define routes

$router->route(GET, PAGE, '/home',      'pages/home.php');
$router->route(GET, PAGE, '/about', 'pages/about.php');
// Login / logout handled by HTMX
$router->route(GET,    PAGE, '/login',     'pages/login.php');
$router->route(POST,   HTMX, '/login',     'actions/login-user.php');
$router->route(POST,   HTMX, '/logout',    'actions/logout-user.php');

//-------------------------------------------------------------
// Generate the required view
$router->view();

?>
