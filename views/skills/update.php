<?php ob_start(); ?>
<?php include_once("../common/header.php"); ?>
<?php
use App\skills\skills;
$skills= new skills();
$skills->setdata($_POST);
$skills->update();
?>

<?php  ob_end_flush(); ?>


