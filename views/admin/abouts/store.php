<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\abouts\abouts;
session_start();
$sk = new abouts();

$sk->setdata($_POST);
$sk->store();