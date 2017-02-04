
<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\settings\settings;
session_start();
$sk = new settings();

$_SESSION['setting']="in";

$sk->setdata($_GET);
$sk->delete();


