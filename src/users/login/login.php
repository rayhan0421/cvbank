<?php
namespace App\users\login;
use App\model\model;
Class login extends model{

    protected $id="";
    protected $username='';
    protected $email ='';
    protected $password='';

    // if you use constructor here
    // use this parent::__construct();

    public function setdata($data=''){

        if(array_key_exists('username',$data)){
            $this->username= $data['username'];
        }



        if(array_key_exists('password',$data)){
            $this->password= $data['password'];
        }



    }


    public function login(){

        $quary = "select * from users WHERE (username='$this->username' OR email='$this->username') AND password='$this->password'";

        $stm= $this->pdo->prepare($quary);

        $stm->execute();

        $data = $stm->fetchAll();


        return $data;
    }





}


