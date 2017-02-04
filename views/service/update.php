<?php include_once("../../vendor/autoload.php"); ?>
<?php
use App\service\service;
$service= new service();
$service->setdata($_POST);
$service->update();
?>



