
<?php include_once("../../vendor/autoload.php"); ?>
<?php
use App\skills\skills;
$skills= new skills();
$skills->setdata($_POST);
$skills->update();
?>




