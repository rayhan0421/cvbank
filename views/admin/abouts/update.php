<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\abouts\abouts;
session_start();
$sk = new abouts();
$_SESSION['aboute']='in';
$sk->setdata($_POST);
$sk->update();
