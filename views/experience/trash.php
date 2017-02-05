<?php
include("../../vendor/autoload.php");
use App\experience\experience;
$obj= new experience();
session_start();
//var_dump($obj);
//die();
$value=$obj->setData($_GET)->trash();

?>