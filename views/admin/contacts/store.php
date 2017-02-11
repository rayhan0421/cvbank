<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\contacts\contacts;
session_start();
$sk = new contacts();

$_SESSION['contact'] = "contact";
$sk->setdata($_POST);
$sk->store();
