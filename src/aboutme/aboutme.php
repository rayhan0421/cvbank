<?php
namespace App\aboutme;
use App\model\model;
Class aboutme extends model{

   protected $id="";
   protected $name='';

 // if you use constructor here
  // use this parent::__construct();
    public function setdata($data)
    {
        if (isset($data[0])) {
            if (array_key_exists('id', $data[0])) {
                $this->id = $data[0]['id'];
            }
        }
    }
 public function index(){



    $queary = "select * from abouts where abouts.user_id=$this->id";

     $st = $this->pdo->prepare($queary);

     $st->execute();


     $stu= $st->fetch();

     return $stu;


  }



  protected function validate(){


    $_SESSION["msg"] = "suucessful validate about me";
    $_SESSION["fail"] = "failed validation";
    header("location:http://localhost/cvbank/views/aboutme/index.php");

  }


 }


