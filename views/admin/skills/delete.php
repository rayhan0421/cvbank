<?php
/**
 * Created by PhpStorm.
 * User: rayha
 * Date: 03-02-2017
 * Time: 10:12 PM
 */
session_start();

$_SESSION['msg'] = "from deleted";
var_dump($_GET);
$user_id=$_GET['user_id'];

header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$user_id");