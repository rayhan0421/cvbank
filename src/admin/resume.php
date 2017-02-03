<?php
namespace App\admin;
use App\model\model;
Class resume extends model{


    protected $id='';

    // if you use constructor here
    // use this parent::__construct();

    public function setdata($data)
    {


        if (isset($data[0])) {
            if (array_key_exists('id', $data)) {
                $this->id = $data['id'];
            }
        }

    }

    public function about(){


     return $this->id ;
    }
    public function skill(){
        return $this->id ;
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