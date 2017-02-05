
<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\abouts\abouts;
session_start();
$_SESSION['aboute']='in';
$sk = new abouts();
$sk->setdata($_GET);
$sk->delete();


