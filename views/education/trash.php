<?php
include("../../vendor/autoload.php");
use App\education\education;
$obj= new education();
session_start();
$value=$obj->setData($_GET)->trash();

?>