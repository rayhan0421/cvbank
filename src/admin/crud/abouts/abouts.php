<?php
namespace App\admin\crud\abouts;
use App\model\model;
Class abouts extends model
{

    protected $id = '';
    protected $title='';
    protected $phone='';
    protected $bio='';

    protected $user_id= '';


    public function setdata($data)
    {

        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }

        if (array_key_exists('user_id', $data)) {
            $this->user_id = $data['user_id'];
        }
        if(array_key_exists('title',$data))  {
            $this->title= $data['title'];
        }
        if(array_key_exists('bio',$data))  {
            $this->bio= $data['bio'];
        }

        if(array_key_exists('phone',$data))  {
            $this->phone= $data['phone'];
        }

     $this->validate();
    }


    public function store(){



        $queary = "INSERT INTO `abouts` (`id`,`user_id`,`title`,`phone`,`bio`,`created_at`) VALUES (:a,:b,:c,:d,:e,:f);";

        $st = $this->pdo->prepare($queary);

        $st->execute(
            array(
                ':a'=>null,
                ':b'=>$this->user_id,
                ':c'=>$this->title,
                ':d'=>$this->phone,
                ':e'=>$this->bio,
                ':f'=>date('Y-m-d h:m:s')

            )
        );



        if($st){

            $_SESSION['msg']= "Successfully added aboute";



            header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");
        }else{

            $_SESSION['msg']= "aboute creation failed";


            header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");

        }


    }
    public function update(){


        try {
            $query = "UPDATE abouts SET title=:title,phone=:phone,bio=:bio WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->id,
                    ':title' => $this->title,
                    ':phone'=>$this->phone,
                    ':bio' =>$this->bio

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
            $query = "UPDATE abouts SET deleted_at=:datetme WHERE id=:id";


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

    public function validate(){

        $this->title = filter_var($this->title,FILTER_SANITIZE_STRIPPED);
        $this->phone = filter_var($this->phone,FILTER_SANITIZE_STRIPPED);

    }
}