<?php
include("../../vendor/autoload.php");
use App\hobbies\hobbies;
$hobbies= new hobbies();
$hobbies->setdata($_GET);
$hobbies =$hobbies->restore();
