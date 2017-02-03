<?php
include("../../vendor/autoload.php");
use App\post\post;
$post= new post();
$post->setdata($_GET);
$post =$post->restore();
