<?php
include("../../vendor/autoload.php");
use App\users\signup\signup;
$d= new signup();
session_start();

$oldpass = $_SESSION['userinfo'][0]['password'];
$old_newpass= $_POST['passwordsignup'];
$newpass = $_POST['passwordsignup_confirm'];



if($oldpass===$old_newpass){
    $d->setdata($_POST);
    $d->update();


}else{

 $_SESSION['msg']= "please give your old password correctly" ;

    header("location:http://localhost/cvbank/views/users/edit.php");
}
