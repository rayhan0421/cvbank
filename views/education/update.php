
<?php include_once("../../vendor/autoload.php"); ?>

<?php
use App\education\education;
$education= new education();
$education->setdata($_POST);
$value= $education->update();
?>


