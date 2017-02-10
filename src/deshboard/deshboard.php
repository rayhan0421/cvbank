<?php
namespace App\deshboard;
use App\model\model;
Class deshboard extends model{

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



        $queary = "select * from users";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;


    }

   public function totalusers(){

       $queary = "select COUNT(*) as tnumber from users";

       $st = $this->pdo->prepare($queary);

       $st->execute();

       $stu= $st->fetch();

       return $stu;
   }

  protected function validate(){


    $_SESSION["msg"] = "suucessful validate";
    $_SESSION["fail"] = "failed validation";
    header("location:http://localhost/cvbank/views/deshboard/index.php");

  }


}


