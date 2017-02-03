<?php

include("../../vendor/autoload.php");
use App\award\award;
$obj= new award();
session_start();
$value=$obj->setData($_GET)->trash();

?>