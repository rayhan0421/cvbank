<?php
namespace App\admin\crud\portfolios;
use App\model\model;
Class portfolios extends model
{

    protected $id = '';
    protected $title='';
    protected $desc='';
    protected $img='';
    protected $cat='';
    protected $user_id= '';



    public function setdata($data)
    {

        if(array_key_exists('id',$data))  {
            $this->id= $data['id'];
        }

        if(array_key_exists('user_id',$data))  {
            $this->user_id= $data['user_id'];
        }

        if(array_key_exists('title',$data))  {
            $this->title= $data['title'];
        }
        if(array_key_exists('description',$data))  {
            $this->desc= $data['description'];
        }

        if(array_key_exists('img',$data))  {
            $this->img= $data['img'];
        }



        if(array_key_exists('category',$data))  {
            $this->cat= $data['category'];
        }
    }
    public function store(){


        try{
            $queary = "INSERT INTO `Portfolios` (`id`, `user_id`,`title`,`description`,`img`,`category`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a'=>null,
                    ':h'=>$this->user_id,
                    ':b'=>$this->title,
                    ':c'=>$this->desc,
                    ':d'=>$this->img,
                    ':e'=>$this->cat,
                    ':g'=>date('Y-m-d h:m:s')

                )
            );


            session_start();
            if($st){

                $_SESSION['msg']= "Successfully added Portfolio";


                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");
            }else{

                $_SESSION['msg']= "portfolios creation failed";

                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }
    public function update(){

         try {
             if(empty($this->img)){
                 $query = "UPDATE Portfolios SET title=:title,description=:description, category=:category WHERE id=:id";


                 $stmt = $this->pdo->prepare($query);
                 $stmt->execute(
                     array(
                         ':id' => $this->id,
                         ':title' => $this->title,
                         ':description'=>$this->desc,
                         ':category'=>$this->cat
                     )
                 );
             }else{
                 $query = "UPDATE Portfolios SET title=:title,description=:description, category=:category,img=:img WHERE id=:id";


                 $stmt = $this->pdo->prepare($query);
                 $stmt->execute(
                     array(
                         ':id' => $this->id,
                         ':title' => $this->title,
                         ':description'=>$this->desc,
                         ':category'=>$this->cat,
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
            $query = "UPDATE portfolios SET deleted_at=:datetme WHERE id=:id";


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