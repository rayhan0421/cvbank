
<?php include_once("../../vendor/autoload.php"); ?>
<?php
use App\post\post;
$post= new post();
$post->setdata($_POST);
$post->update();
?>
