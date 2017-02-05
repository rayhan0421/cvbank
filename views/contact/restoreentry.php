<?php
include("../../vendor/autoload.php");
use App\Contact\Contact;
$Contact= new Contact();
$Contact->setdata($_GET);
$Contact =$Contact->restore();
