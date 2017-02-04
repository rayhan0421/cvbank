
<?php include_once("../../vendor/autoload.php"); ?>
<?php
use App\Contact\Contact;
$Contact= new Contact();
$Contact->setdata($_POST);
$Contact->update();
?>

