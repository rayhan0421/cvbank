<?php
namespace App\Contact;
use App\model\model;
Class Contact extends model{

    protected $id='';
    protected $name='';
    protected $email='';
    protected $message='';
    protected $phone='';
    protected $auto_id='';
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

            if(array_key_exists('name',$data))  {
                $this->name= $data['name'];
            }
            if(array_key_exists('email',$data))  {
                $this->email= $data['email'];
            }

            if(array_key_exists('message',$data))  {
                $this->message= $data['message'];
            }

            if(array_key_exists('phone',$data))  {
                $this->phone= $data['phone'];
            }
        }

        return $this;


    }

    public function index(){


        $queary = "SELECT  contacts.id as cid, contacts.email as cmail, contacts.*, users.* FROM  contacts JOIN users ON users.id = contacts.user_id WHERE users.id=$this->id AND  contacts.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;

    }
    public function alert(){


        $queary = "SELECT  contacts.id as cid, contacts.email as cmail, contacts.*, users.* FROM  contacts JOIN users ON users.id = contacts.user_id WHERE users.id=$this->id AND  contacts.deleted_at='0000-00-00 00:00:00' LIMIT 3";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;

    }


    public function store(){


        try{
            $queary = "INSERT INTO `contacts` (`id`, `user_id`,`name`,`email`,`message`,`phone`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a'=>null,
                    ':h'=>$this->id,
                    ':b'=>$this->name,
                    ':c'=>$this->email,
                    ':d'=>$this->message,
                    ':e'=>$this->phone,
                    ':g'=>date('Y-m-d h:m:s')

                )
            );


            session_start();
            if($st){

                $_SESSION['msg']= "Successfully added Contact";


                header("location:http://localhost/cvbank/views/Contact/create.php");
            }else{

                $_SESSION['msg']= "skill creation failed";

                header("location:http://localhost/cvbank/views/Contact/create.php");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }

    public function update(){

        session_start();
        try {
            $query = "UPDATE contacts SET name=:name,email=:email,message=:message,phone=:phone WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->auto_id,
                    ':name' => $this->name,
                    ':email'=>$this->email,
                    ':message' => $this->message,
                    ':phone' => $this->phone,
                )
            );
            if($stmt){

                $_SESSION['msg'] ="succesfully updated ";

                header("location:http://localhost/cvbank/views/Contact");

            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public  function trash()
    {

        try {
            $query = "UPDATE contacts SET deleted_at=:datetme WHERE id=:id";


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
                header("location:http://localhost/cvbank/views/contact/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function trashlist(){

        $queary = "SELECT  contacts.* FROM  contacts JOIN users ON users.id = contacts.user_id WHERE users.id=$this->id AND  contacts.deleted_at!='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }

    public function show(){


        $queary = "SELECT  * FROM  contacts WHERE id=$this->auto_id";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetch();

        return $stu;
    }

    public function restore(){

        try {
            $query = "UPDATE contacts SET deleted_at=:datetme WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' =>$this->auto_id,
                    ':datetme'=>'0000-00-00 00:00:00'
                )
            );

            if($stmt){


                $_SESSION['message'] ="succesfully restore ";
                header("location:http://localhost/cvbank/views/contact/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }



}


