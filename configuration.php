<?php 

session_start();

define('LOGUEADO', isset($_SESSION["EMAIL"]));

define('ISADMIN', isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true);