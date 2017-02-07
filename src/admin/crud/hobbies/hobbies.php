<?php
namespace App\admin\crud\hobbies;
use App\model\model;
Class hobbies extends model
{

    protected $id = '';
    protected $title = '';
    protected $description = '';
    protected $img= '';
    protected $user_id= '';


    public function setdata($data)
    {

        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }

        if (array_key_exists('user_id', $data)) {
            $this->user_id = $data['user_id'];
        }


        if (array_key_exists('title', $data)) {
            $this->title = $data['title'];
        }
        if (array_key_exists('description', $data)) {
            $this->description = $data['description'];
        }
        if (array_key_exists('img', $data)) {
            $this->img = $data['img'];
        }
    }
    public function store(){


        try{
            $queary = "INSERT INTO `hobbies` (`id`, `user_id`,`title`,`description`,`img`,`created_at`) VALUES (:a,:h,:b,:c,:d,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a'=>null,
                    ':h'=>$this->user_id,
                    ':b'=>$this->title,
                    ':c'=>$this->description,
                    ':d'=>$this->img,
                    ':g'=>date('Y-m-d h:m:s')

                )
            );

//            echo "<pre>";
//            var_dump($st);
//            die();

            session_start();
            if($st){

                $_SESSION['msg']= "Successfully added hobbies";


                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");
            }else{

                $_SESSION['msg']= "Added hobbies failed";

                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }
    public function update(){


         try {
             if(empty($this->img)){
                 $query = "UPDATE hobbies SET title=:title,description=:item WHERE id=:id";


                 $stmt = $this->pdo->prepare($query);
                 $stmt->execute(
                     array(
                         ':id' => $this->id,
                         ':title' => $this->title,
                         ':item'=>$this->description,

                     )
                 );

             }else{
                 $query = "UPDATE hobbies SET title=:title,description=:item,img=:img WHERE id=:id";


                 $stmt = $this->pdo->prepare($query);
                 $stmt->execute(
                     array(
                         ':id' => $this->id,
                         ':title' => $this->title,
                         ':item'=>$this->description,
                         ':img'=>$this->img
                     )
                 );

             }
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
            $query = "UPDATE hobbies SET deleted_at=:datetme WHERE id=:id";


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