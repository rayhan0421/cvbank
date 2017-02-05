
<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\portfolios\portfolios;
session_start();
$sk = new portfolios();
$sk->setdata($_GET);
$sk->delete();


