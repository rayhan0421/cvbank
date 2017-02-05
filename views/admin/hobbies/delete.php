
<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\hobbies\hobbies;
session_start();
$sk = new hobbies();
$sk->setdata($_GET);
$sk->delete();


