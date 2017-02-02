<?php
namespace App\skills;
use App\model\model;
Class skills extends model{

    protected $id='';
    protected $title='';
    protected $desc='';
    protected $level='';
    protected $experience='';
    protected $area='';
    // if you use constructor here
    // use this parent::__construct();

   public function setdata($data){

   if( isset($data[0])){
       if(array_key_exists('id',$data[0]))  {
           $this->id= $data[0]['id'];
       }
   }else{

       if(array_key_exists('user_id',$data))  {
           $this->id= $data['user_id'];
       }

       if(array_key_exists('title',$data))  {
           $this->title= $data['title'];
       }
       if(array_key_exists('desc',$data))  {
           $this->desc= $data['desc'];
       }

       if(array_key_exists('level',$data))  {
           $this->title= $data['level'];
       }

       if(array_key_exists('experience',$data))  {
           $this->experience= $data['experience'];
       }

       if(array_key_exists('area',$data))  {
           $this->area= $data['area'];
       }
   }




   }

    public function index(){


        $queary = "SELECT * FROM  skills JOIN users ON users.id = skills.user_id WHERE users.id=$this->id";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;

    }


    public function store(){



        try{
            $queary = "INSERT INTO `skills` (`id`, `user_id`,`title`,`description`,`level`,`experience`,`experience_area`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:f,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a'=>null,
                    ':h'=>$this->id,
                    ':b'=>$this->title,
                    ':c'=>$this->desc,
                    ':d'=>$this->level,
                    ':e'=>$this->experience,
                    ':f'=>$this->area,
                    ':g'=>date('Y-m-d h:m:s')

                )
            );


            session_start();
            if($st){

                $_SESSION['msg']= "Successfully added skill";


                header("location:http://localhost/cvbank/views/skills/create.php");
            }else{

                $_SESSION['msg']= "skill creation failed";

                header("location:http://localhost/cvbank/views/skills/create.php");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }

   public function update(){

   }

    public function delete(){

    }

    public function restore(){

    }



}


