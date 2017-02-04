<?php include_once("../../vendor/autoload.php"); ?>
<?php
use App\facts\facts;
$service= new facts();
$service->setdata($_POST);
$service->update();
?>



