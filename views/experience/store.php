<?php
include("../../vendor/autoload.php");
use App\experience\experience;
$d= new experience();
//var_dump($d);
//die();
session_start();
$_POST['user_id']=$_SESSION['userinfo'][0]['id'];
$d->setdata($_POST);
$d->store();

