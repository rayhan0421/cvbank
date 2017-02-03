<?php
include("../../vendor/autoload.php");
use App\experiance\experiance;
$obj= new experiance();
session_start();
//var_dump($obj);
//die();
$value=$obj->setData($_GET)->trash();

?>