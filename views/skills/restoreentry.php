<?php
include("../../vendor/autoload.php");
use App\skills\skills;
$skills= new skills();
$skills->setdata($_GET);
$skills =$skills->restore();
