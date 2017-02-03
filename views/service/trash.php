<?php
include("../../vendor/autoload.php");
use App\service\service;
$obj= new service();
session_start();
$value=$obj->setData($_GET);
$obj->trash();

?>