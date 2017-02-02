<?php
namespace App\deshboard;
use App\model\model;
Class deshboard extends model{

 // if you use constructor here
  // use this parent::__construct();

 public function index(){

     $queary = "select * from users";

     $st = $this->pdo->prepare($queary);

     $st->execute();

     $stu= $st->fetchAll();

     return $stu;


 }

 }


