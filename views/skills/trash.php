<?php
include("../../vendor/autoload.php");
use App\skills\skills;
$obj= new skills();
session_start();
$value=$obj->setData($_GET)->trash();

?>