<?php
include("../../vendor/autoload.php");
use App\hobbies\hobbies;
$obj= new hobbies();
session_start();
$obj->setData($_GET);
$obj->trash();



?>