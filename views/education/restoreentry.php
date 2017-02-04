<?php
include("../../vendor/autoload.php");
use App\education\education;
$education= new education();
$education->setdata($_GET);
$education =$education->restore();
