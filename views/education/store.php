<?php
include("../../vendor/autoload.php");
use App\education\education;
$d= new education();
session_start();
$_POST['user_id']=$_SESSION['userinfo'][0]['id'];
$d->setdata($_POST);
$d->store();
