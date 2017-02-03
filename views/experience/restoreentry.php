<?php
include("../../vendor/autoload.php");
use App\experiance\experiance;
$experiance= new experiance();
$experiance->setdata($_GET);
$experiance =$experiance->restore();
