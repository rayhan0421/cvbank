<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\skills\skills;
session_start();
$sk = new skills();


$sk->setdata($_POST);
$sk->update();


//$_SESSION['msg'] = "from update";
//$_SESSION['about']='in';
header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$user_id");