<?php
include("../../vendor/autoload.php");
use App\experience\experience;
$experience= new experience();
$experience->setdata($_GET);
$experience =$experience->restore();
