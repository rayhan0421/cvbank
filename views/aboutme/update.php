
<?php include_once("../../vendor/autoload.php"); ?>
<?php
use App\aboutme\aboutme;
session_start();
$ab= new aboutme();
$ab->setdata($_POST);

if(isset($_POST['id'])){
 $ab->update();
}else{

  $ab->store();
}


//var_dump($_POST);
//die();




?>
