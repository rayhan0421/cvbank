<?php
include("../../vendor/autoload.php");
use App\settings\settings;
$settings= new settings();
$settings->setdata($_GET);
$settings =$settings->restore();
