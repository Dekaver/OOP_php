<?php

session_start();

session_destroy();
//$url = $_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI'];
header("Location: index.php");