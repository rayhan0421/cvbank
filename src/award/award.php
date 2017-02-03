<?php
namespace App\award;
use App\model\model;
Class award extends model{

    protected $id='';
    protected $title='';
    protected $organization='';
    protected $description='';
    protected $location='';
    protected $year='';
    // if you use constructor here
    // use this parent::__construct();

    public function setdata($data){


        if( isset($data[0])){
            if(array_key_exists('id',$data[0]))  {
                $this->id= $data[0]['id'];
            }
        }else{

            if(array_key_exists('id',$data))  {
                $this->auto_id= $data['id'];
            }

            if(array_key_exists('user_id',$data))  {
                $this->id= $data['user_id'];
            }

            if(array_key_exists('title',$data))  {
                $this->title= $data['title'];
            }
            if(array_key_exists('organization',$data))  {
                $this->organization= $data['organization'];
            }

            if(array_key_exists('description',$data))  {
                $this->description= $data['description'];
            }

            if(array_key_exists('location',$data))  {
                $this->location= $data['location'];
            }

            if(array_key_exists('year',$data))  {
                $this->year= $data['year'];
            }
        }

        return $this;


    }

    public function index(){


        $queary = "SELECT  awards.id as aid, awards.*, users.* FROM  awards JOIN users ON users.id = awards.user_id WHERE users.id=$this->id AND  awards.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;

    }


    public function store(){



        try{
            $queary = "INSERT INTO `awards` (`id`, `user_id`,`title`,`organization`,`description`,`location`,`year`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:f,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a'=>null,
                    ':h'=>$this->id,
                    ':b'=>$this->title,
                    ':c'=>$this->organization,
                    ':d'=>$this->description,
                    ':e'=>$this->location,
                    ':f'=>$this->year,
                    ':g'=>date('Y-m-d h:m:s')

                )
            );


            session_start();
            if($st){

                $_SESSION['msg']= "Successfully added award";


                header("location:http://localhost/cvbank/views/award/create.php");
            }else{

                $_SESSION['msg']= "skill creation failed";

                header("location:http://localhost/cvbank/views/award/create.php");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }

    public function update(){

        session_start();
        try {
            $query = "UPDATE awards SET title=:title,organization=:organization WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->auto_id,
                    ':title' => $this->title,
                    ':organization'=>$this->organization
                )
            );
            if($stmt){

                $_SESSION['msg'] ="succesfully updated ";

                header("location:http://localhost/cvbank/views/award");

            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public  function trash()
    {

        try {
            $query = "UPDATE awards SET deleted_at=:datetme WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->auto_id,
                    ':datetme' => date('y-m-d h:m:s'),
                )
            );
            if($stmt){
                session_start();
                $_SESSION['msg'] ="succesfully deleted ";
                header("location:http://localhost/cvbank/views/award/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function trashlist(){

        $queary = "SELECT  awards.* FROM  awards JOIN users ON users.id = awards.user_id WHERE users.id=$this->id AND  awards.deleted_at!='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }

    public function show(){


        $queary = "SELECT  * FROM  awards WHERE id=$this->auto_id";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetch();

        return $stu;
    }

    public function restore(){

        try {
            $query = "UPDATE awards SET deleted_at=:datetme WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' =>$this->auto_id,
                    ':datetme'=>'0000-00-00 00:00:00'
                )
            );

            if($stmt){


                $_SESSION['message'] ="succesfully restore ";
                header("location:http://localhost/cvbank/views/award/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }



}


