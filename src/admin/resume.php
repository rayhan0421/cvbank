<?php
namespace App\admin;
use App\model\model;
Class resume extends model{


    protected $id='';

    // if you use constructor here
    // use this parent::__construct();

    public function setdata($data)
    {



            if (array_key_exists('id', $data)) {
                $this->id = $data['id'];
            }


    }

    public function about(){
        $queary = "SELECT  abouts.id as aboutid ,abouts.* FROM abouts JOIN users ON users.id = abouts.user_id WHERE users.user_role!=2 AND user_id=$this->id";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;


    }
    public function skill(){
        $queary = "SELECT  skills.id as skillid ,skills.* FROM skills JOIN users ON users.id =skills.user_id WHERE users.user_role!=2 AND user_id=$this->id";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }
    public function hobbies(){
        return $this->id ;
    }
    public function facts(){
        return $this->id ;
    }
    public function publication(){
        return $this->id ;
    }
    public function portfolio(){
        return $this->id ;
    }
    public function post(){
        return $this->id ;
    }
    public function settings(){
        return $this->id ;
    }
    public function service(){
        return $this->id ;
    }
    public function experience(){
        return $this->id ;
    }
    public function award(){
        return $this->id ;
    }
    public function education(){
        return $this->id ;
    }
    public function contact(){
        return $this->id ;
    }


}