<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\skills\skills;
session_start();
$sk = new skills();

$sk->setdata($_POST);
$sk->store();