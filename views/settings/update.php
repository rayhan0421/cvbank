<?php include_once("../../vendor/autoload.php"); ?>
<?php
use App\settings\settings;
$settings= new settings();
$settings->setdata($_POST);

$settings->update($_POST);
?>



