<?php
include("../../vendor/autoload.php");
use App\Portfolio\Portfolio;
$Portfolio= new Portfolio();
$Portfolio->setdata($_GET);
$Portfolio =$Portfolio->restore();
