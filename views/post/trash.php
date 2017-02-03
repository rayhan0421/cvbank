<?php
include("../../vendor/autoload.php");
use App\post\post;
$obj= new post();
session_start();
$value=$obj->setData($_GET)->trash();

?>