<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\educations\educations;
session_start();
$sk = new educations();
$sk->setdata($_POST);
$sk->store();
