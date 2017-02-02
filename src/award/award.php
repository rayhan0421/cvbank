<?php
namespace App\aboutme;
use App\model\model;
Class aboutme extends model{

   protected $id="";
   protected $name='';

 // if you use constructor here
  // use this parent::__construct();

 public function index(){

     $this->validate();

    $queary = "select * from users";

     $st = $this->pdo->prepare($queary);

     $st->execute();

     $stu= $st->fetchAll();

     return $stu;


  }
    public function list(){


        $_SESSION["msg"] = "suucessful validate about me now ";
        $_SESSION["fail"] = "failed validation";

        $queary = "select * from users";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;


    }

  protected function validate(){


    $_SESSION["msg"] = "suucessful validate about me";
    $_SESSION["fail"] = "failed validation";
    header("location:http://localhost/cvbank/views/aboutme/index.php");

  }


 }


