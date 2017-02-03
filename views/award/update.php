<?php include_once("../../vendor/autoload.php"); ?>
<?php
use App\award\award;
$award= new award();
$award->setdata($_POST);
$award->update();
?>