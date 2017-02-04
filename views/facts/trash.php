<?php
include("../../vendor/autoload.php");
use App\facts\facts;
$obj= new facts();
session_start();
$value=$obj->setData($_GET);
$obj->trash();

?>