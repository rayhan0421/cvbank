<?php include_once("../../vendor/autoload.php"); ?>
<?php
use App\experiance\experiance;
$experiance= new experiance();
//print_r($experiance);
//die();
$experiance->setdata($_POST);
$experiance->update();

?>
