<?php 

session_start();

define('LOGUEADO', isset($_SESSION["EMAIL"]));
define('ADMIN_ID', 1);
define('ISADMIN', isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true);