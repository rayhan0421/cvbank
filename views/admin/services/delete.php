
<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\services\services;
session_start();
$sk = new services();
$_SESSION['service']="in";
$sk->setdata($_GET);
$sk->delete();


