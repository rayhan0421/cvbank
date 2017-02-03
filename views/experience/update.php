<?php include_once("../../vendor/autoload.php"); ?>
<?php
use App\experience\experience;
$experience= new experience();
//print_r($experiance);
//die();
$experience->setdata($_POST);
$experience->update();

?>
