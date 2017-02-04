<?php
include("../../vendor/autoload.php");
use App\Portfolio\Portfolio;
$obj= new Portfolio();
session_start();
$value=$obj->setData($_GET)->trash();

?>