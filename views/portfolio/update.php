
<?php include_once("../../vendor/autoload.php"); ?>
<?php
use App\Portfolio\Portfolio;
$Portfolio= new Portfolio();
$Portfolio->setdata($_POST);
$Portfolio->update();
?>
