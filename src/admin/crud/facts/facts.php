<?php
namespace App\admin\crud\facts;
use App\model\model;
Class facts extends model
{

    protected $id = '';
    protected $title='';
    protected $no_of_items='';
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


        if(array_key_exists('no_of_items',$data))  {
            $this->no_of_items= $data['no_of_items'];
        }

        if(array_key_exists('img',$data))  {
            $this->img= $data['img'];
        }
    }

    public function store(){


        try{
            if(empty($this->img)) {
                $queary = "INSERT INTO `facts` (`id`, `user_id`,`title`,`no_of_items`,`created_at`) VALUES (:a,:h,:b,:c,:g);";

                $st = $this->pdo->prepare($queary);

                $st->execute(
                    array(
                        ':a' => null,
                        ':h' => $this->user_id,
                        ':b' => $this->title,
                        ':c' => $this->no_of_items,
                         ':g' => date('Y-m-d h:m:s')

                    )
                );
            }else{
                $queary = "INSERT INTO `facts` (`id`, `user_id`,`title`,`no_of_items`,`img`,`created_at`) VALUES (:a,:h,:b,:c,:d,:g);";

                $st = $this->pdo->prepare($queary);

                $st->execute(
                    array(
                        ':a'=>null,
                        ':h'=>$this->user_id,
                        ':b'=>$this->title,
                        ':c'=>$this->no_of_items,
                        ':d'=>$this->img,
                        ':g'=>date('Y-m-d h:m:s')

                    )
                );
            }
        //    echo "<pre>";
         //   var_dump($st);
          //  die();

            if($st){

                $_SESSION['msg']= "Successfully added facts";


                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");
            }else{

                $_SESSION['msg']= "Added facts failed";

                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }

    }

    public function update(){


         try {
             if(empty($this->img)){
                 $query = "UPDATE facts SET title=:title,no_of_items=:no_of_items WHERE id=:id";


                 $stmt = $this->pdo->prepare($query);
                 $stmt->execute(
                     array(
                         ':id' => $this->id,
                         ':title' => $this->title,
                         ':no_of_items'=>$this->no_of_items,

                     )
                 );
             }else{
                 $query = "UPDATE facts SET title=:title,no_of_items=:no_of_items,img=:img WHERE id=:id";


                 $stmt = $this->pdo->prepare($query);
                 $stmt->execute(
                     array(
                         ':id' => $this->id,
                         ':title' => $this->title,
                         ':no_of_items'=>$this->no_of_items,
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
            $query = "UPDATE facts SET deleted_at=:datetme WHERE id=:id";


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