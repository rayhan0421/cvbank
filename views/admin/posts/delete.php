
<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\posts\posts;
session_start();
$sk = new posts();
$sk->setdata($_GET);
$sk->delete();


