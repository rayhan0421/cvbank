<?php
include("../../vendor/autoload.php");
use App\settings\settings;
$obj= new settings();
session_start();
$value=$obj->setData($_GET)->trash();

?>