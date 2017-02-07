<?php
include("../../vendor/autoload.php");
use App\Portfolio\Portfolio;
$d= new Portfolio();
session_start();
$_POST['user_id']=$_SESSION['userinfo'][0]['id'];

if(strlen($_POST['title'])<3 && strlen($_POST['desc'])<5){

    $_SESSION['msg']=" please fill the field";

    header("location:create.php");

}else {
    if ($_FILES['img']['error'] == 0) {

        if (isset($_FILES['img'])) {
            $errors = array();
            $file_name = $_FILES['img']['name'];
            $file_size = $_FILES['img']['size'];
            $file_tmp = $_FILES['img']['tmp_name'];
            $file_type = $_FILES['img']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['img']['name'])));

            $expensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext, $expensions) === false) {
                $_SESSION['msg'] = "extension not allowed, please choose a JPEG or PNG file.";
            }

            if ($file_size > 2097152) {
                $_SESSION['msg'] = 'File size must be excately 2 MB';
            }

            if (empty($errors) == true) {

                $file_name= uniqid().'.'.$file_ext;

                move_uploaded_file($file_tmp, "../../storage/images/" . $file_name);
                $_SESSION['msg'] = "success";
            } else {
                $_SESSION['msg'] = "failed to upload";
            }


            $_POST['img'] = $file_name;
            $d->setdata($_POST);
            $d->store();
        } else {

            $_SESSION['msg'] = " please upload your service image";
        }


    }else{
        $d->setdata($_POST);
        $d->store();
    }
}







