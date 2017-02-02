<?php
include("../../vendor/autoload.php");
use App\users\login\login;
session_start();
$auth = new login();

$auth->setdata($_POST);

$userinfo=$auth->login();

if(empty($userinfo)){

    $_SESSION['msg']= "login failed";
    header("location:http://localhost/cvbank/views/login/#tologin");
}else{

    $_SESSION['msg']= "welcome to cvbank";
    $_SESSION['userinfo']= $userinfo;



 $role= $userinfo[0]['user_role'];

 if($role==1){
     header("location:http://localhost/cvbank/views/deshboard/");
 }else{

     header("location:http://localhost/cvbank/views/admin/");

 }


}





