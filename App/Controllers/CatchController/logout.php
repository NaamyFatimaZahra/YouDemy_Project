<?php
include_once '../../config/config.php';
require_once '../../../vendor/autoload.php';
use  App\Controllers\AuthController;

$logOut=new AuthController();
$logOut->logOut();
?>
