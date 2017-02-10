<?php
include_once ("../../../vendor/autoload.php");
use App\admin\crud\facts\facts;
session_start();
$sk = new facts();

$_SESSION['facts']="in";

$sk->setdata($_POST);
$sk->update();


/*
if ($_FILES['img']['error'] == 0) {

    if (isset($_FILES['img'])) {
        $errors = array();
        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_tmp = $_FILES['img']['tmp_name'];
        $file_type = $_FILES['img']['type'];
        $file_ext = explode('.',$file_name);
        $file_ext = end($file_ext);
        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $_SESSION['msg'] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $_SESSION['msg'] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {

            $file_name= uniqid().'.'.$file_ext;

            move_uploaded_file($file_tmp, "../../../storage/images/" . $file_name);
            $_SESSION['msg'] = "success";
        } else {
            $_SESSION['msg'] = "failed to upload";
        }


        $_POST['img'] = $file_name;
        $sk->setdata($_POST);
        $sk->update();

    } else {

        $_SESSION['msg'] = " please upload your service image";
    }


}else{
    $sk->setdata($_POST);
    $sk->update();

}
*/
