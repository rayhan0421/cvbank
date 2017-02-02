<?php
include("../../vendor/autoload.php");
use App\users\signup\signup;
session_start();
$reg = new signup();

$reg->setdata($_POST);

if(!$reg->useravailabilty()){

    if(($_POST['passwordsignup']) == ($_POST['passwordsignup_confirm'])){


        if(!preg_match(("/([a-z0-9_])/"),$_POST['usernamesignup'])){


            $_SESSION['msg']= "username is caps";

            header("location:http://localhost/cvbank/views/login/#toregister");

        }else{


            $reg->store();

        }

    }else{


        $_SESSION['msg']= "password not match";

        header("location:http://localhost/cvbank/views/login/#toregister");

    }

}else{

    $_SESSION['msg']= "user already exist";

    header("location:http://localhost/cvbank/views/login/#toregister");
}



