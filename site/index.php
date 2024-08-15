<?php

//-------------------------------------------------------------
// Libraries
require_once 'lib/debug.php';
require_once 'lib/router.php';


//-------------------------------------------------------------
// Site Configuration
const SITE_NAME  = 'Retail Store Management';
const SITE_OWNER = 'William Papps';

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

$router->route(GET, PAGE, '/',      'pages/home.php');
$router->route(GET, PAGE, '/home',      'pages/home.php');
$router->route(GET, PAGE, '/shifts',      'pages/shifts.php');

// Login / logout handled by HTMX
$router->route(GET,    PAGE, '/login',     'pages/login.php');
$router->route(POST,   HTMX, '/login-user',     'actions/login-user.php');
$router->route(POST,   HTMX, '/logout',    'actions/logout-user.php');

$router->route(POST, HTMX, '/list-order', 'actions/list.php');

$router->route(GET,    PAGE, '/list-users',     'pages/list-users.php');

$router->route(GET,   PAGE, '/toggle-useradmin',    'actions/toggle-useradmin.php');
$router->route(GET,   PAGE, '/toggle-usermanager',    'actions/toggle-usermanager.php');
$router->route(GET,   PAGE, '/delete-user',    'actions/delete-user.php');


$router->route(GET,    PAGE, '/signup',     'pages/signup.php');
$router->route(POST,   HTMX, '/signup-user',     'actions/signup-user.php');

$router->route(GET,    PAGE, '/addshift',     'pages/addshift.php');
$router->route(POST,   HTMX, '/add-shift',     'actions/add-shift.php');

$router->route(GET,   PAGE, '/delete-shift',    'actions/delete-shift.php');


//-------------------------------------------------------------
// Generate the required view
$router->view();

?>
