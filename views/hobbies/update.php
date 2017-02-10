<?php include_once("../../vendor/autoload.php"); ?>
<?php
use App\hobbies\hobbies;
$hobbies= new hobbies();
session_start();
$hobbies->setdata($_POST);
$hobbies->update();

/*
if ($_FILES['img']['error'] == 0) {

    if (isset($_FILES['img'])) {
        $errors = array();
        $file_name = $_FILES['img']['name'];
        $file_size = $_FILES['img']['size'];
        $file_tmp = $_FILES['img']['tmp_name'];
        $file_type = $_FILES['img']['type'];
        $file_ext = end(explode('.',$file_name));

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

        $hobbies->setdata($_POST);
        $hobbies->update();
    } else {

        $_SESSION['msg'] = " please upload your hobbies image";
    }


}else{
    $hobbies->setdata($_POST);
    $hobbies->update();
}
*/
?>



