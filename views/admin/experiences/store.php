<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\experiences\experiences;
session_start();
$sk = new experiences();
$sk->setdata($_POST);
$sk->store();