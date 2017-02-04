<?php
include("../../vendor/autoload.php");
use App\service\service;
$service= new service();
$service->setdata($_GET);
$service =$service->restore();
