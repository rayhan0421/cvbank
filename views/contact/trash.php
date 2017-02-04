<?php
include("../../vendor/autoload.php");
use App\Contact\Contact;
$obj= new Contact();
session_start();
//var_dump($obj);
//die();
$value=$obj->setData($_GET)->trash();

?>