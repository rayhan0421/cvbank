<?php
namespace App\admin\crud\services;
use App\model\model;
Class services extends model
{


    protected $id = '';
    protected $title='';
    protected $desc='';
    protected $img='';


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
        if(array_key_exists('desc',$data))  {
            $this->desc= $data['desc'];
        }

        if(array_key_exists('img',$data))  {
            $this->img= $data['img'];
        }

        if(array_key_exists('user_id',$data))  {
            $this->user_id= $data['user_id'];
        }


    }

    public function store(){


        $queary = "INSERT INTO `services` (`id`,`user_id`,`title`,`description`,`img`,`created_at`) VALUES (:a,:b,:c,:d,:e,:f);";

        $st = $this->pdo->prepare($queary);

        $st->execute(
            array(
                ':a'=>null,
                ':b'=>$this->user_id,
                ':c'=>$this->title,
                ':d'=>$this->desc,
                ':e'=>$this->img,
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

            if(empty($this->img)){

                $query = "UPDATE services SET title=:title,description=:desc WHERE id=:id";


                $stmt = $this->pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':id' => $this->id,
                        ':title' => $this->title,
                        ':desc'=>$this->desc


                    )
                );
            }else{
                $query = "UPDATE services SET title=:title, description=:desc, img=:img  WHERE id=:id";


                $stmt = $this->pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':id' => $this->id,
                        ':title' => $this->title,
                        ':desc'=>$this->desc,
                        ':img' =>$this->img

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
            $query = "UPDATE services SET deleted_at=:datetme WHERE id=:id";


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