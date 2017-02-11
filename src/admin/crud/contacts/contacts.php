<?php
namespace App\admin\crud\contacts;
use App\model\model;
Class contacts extends model
{

    protected $id = '';
    protected $title='';
    protected $name='';
    protected $email='';
    protected $message='';
    protected $phone='';
    protected $user_id= '';


    public function setdata($data)
    {

        if(array_key_exists('id',$data))  {
            $this->auto= $data['id'];
        }

        if(array_key_exists('user_id',$data))  {
            $this->user_id= $data['user_id'];
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
    public function store(){




        try{
            $queary = "INSERT INTO `contacts` (`id`, `user_id`,`name`,`email`,`message`,`phone`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a'=>null,
                    ':h'=>$this->user_id,
                    ':b'=>$this->name,
                    ':c'=>$this->email,
                    ':d'=>$this->message,
                    ':e'=>$this->phone,
                    ':g'=>date('Y-m-d h:m:s')

                )
            );

            // mail();
            ob_start();
            if($st){

                $_SESSION['msg']= "Successfully added Contact";


                header("location:http://localhost/cvbank/views/public/resume?id=$this->user_id");
            }else{

                $_SESSION['msg']= "skill creation failed";

                header("location:http://localhost/cvbank/views/public/resume?id=$this->user_id");
ob_end_flush();
            }


        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }
    public function update(){


         try {
             $query = "UPDATE contacts SET name=:name,email=:email,message=:message,phone=:phone WHERE id=:id";


             $stmt = $this->pdo->prepare($query);
             $stmt->execute(
                 array(
                     ':id' => $this->id,
                     ':name' => $this->name,
                     ':email'=>$this->email,
                     ':message' => $this->message,
                     ':phone' => $this->phone,
                 )
             );
            if($stmt){

                $_SESSION['msg'] ="succesfully updated ";


                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");

            }
        } catch (PDOException $e) {
             $_SESSION['msg'] ="faield to updated ";
             header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");
        }


    }

    public function delete(){
        try {
            $query = "UPDATE contacts SET deleted_at=:datetme WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->id,
                    ':datetme' => date('y-m-d h:m:s'),
                )
            );
            if($stmt){

                $_SESSION['msg'] ="succesfully deleted ";
                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");
            }
        } catch (PDOException $e) {
            $_SESSION['msg'] ="failed to deleted ";
            header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");
        }
    }
}