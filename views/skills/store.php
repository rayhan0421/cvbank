<?php
include("../../vendor/autoload.php");
use App\skills\skills;
$d= new skills();
session_start();
$_POST['user_id']=$_SESSION['userinfo'][0]['id'];
$d->setdata($_POST);
$d->store();






