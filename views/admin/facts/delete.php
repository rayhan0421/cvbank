
<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\facts\facts;
session_start();
$sk = new facts();
$sk->setdata($_GET);
$sk->delete();


