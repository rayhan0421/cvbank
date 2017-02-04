<?php
/**
 * Created by PhpStorm.
 * User: rayha
 * Date: 03-02-2017
 * Time: 10:33 PM
 */

session_start();

$_SESSION['msg'] = "from update";

var_dump($_GET);
$user_id=$_GET['user_id'];

$_SESSION['about']='in';
header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$user_id");