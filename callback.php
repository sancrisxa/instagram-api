<?php 

session_start();

require 'src/Instagram.php';
require 'inconfig.php';


if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $_SESSION['in_access_token'] = $instagram->getOAuthToken($code);
}


header("Location: index.php");





