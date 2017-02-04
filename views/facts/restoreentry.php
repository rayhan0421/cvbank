<?php
include("../../vendor/autoload.php");
use App\facts\facts;
$service= new facts();
$service->setdata($_GET);
$service =$service->restore();
