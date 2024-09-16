<?php
session_start();
if (!isset($_SESSION['login'])){
    $_SESSION['login'] = 0;
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = strtoupper($_SERVER['REQUEST_METHOD']);

require "dbconnect.php";

if ($uri == '/'){
    require "home.php";
}
elseif ($uri == '/dashboard'){
    require "dashboard.php";
}
elseif ($uri == '/single'){
    require "single.php";
}
elseif ($uri == '/login'){
    require "login.php";
}
elseif ($uri == '/logout'){
    require "logout.php";
}
elseif ($uri == '/register'){
    require "register.php";
}
elseif ($uri == '/create'){
    require "create.php";
}