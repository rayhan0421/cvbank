<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\awards\awards;
session_start();
$sk = new awards();
$_SESSION['awards']='in';
$sk->setdata($_POST);
$sk->store();