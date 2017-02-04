
<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\awards\awards;
session_start();
$_SESSION['awards']='in';
$sk = new awards();
$sk->setdata($_GET);
$sk->delete();


