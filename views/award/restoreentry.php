<?php
include("../../vendor/autoload.php");
use App\award\award;
$award= new award();
$award->setdata($_GET);
$award =$award->restore();
