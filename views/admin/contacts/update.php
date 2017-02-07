<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\contacts\contacts;
session_start();
$sk = new contacts();
$sk->setdata($_POST);
$sk->update();
