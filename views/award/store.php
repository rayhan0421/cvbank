<?php
include("../../vendor/autoload.php");
use App\award\award;
$d= new award();

session_start();
$_POST['user_id']=$_SESSION['userinfo'][0]['id'];
$d->setdata($_POST);
$d->store();






