<?php
namespace App\admin\crud\settings;
use App\model\model;
Class settings extends model
{

    protected $id = '';
    protected $title='';
    protected $desc='';
    protected $fullname='';
    protected $img='';
    protected $address='';
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
        if(array_key_exists('description',$data))  {
            $this->desc= $data['description'];
        }

        if(array_key_exists('fullname',$data))  {
            $this->fullname= $data['fullname'];
        }

        if(array_key_exists('address',$data))  {
            $this->address= $data['address'];
        }

        if(array_key_exists('img',$data))  {
            $this->img= $data['img'];
        }
    }


    public function store(){



        try{
            if(empty($this->img)){
                $queary = "INSERT INTO `settings` (`id`, `user_id`,`title`,`fullname`,`description`,`address`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:g)";

                $st = $this->pdo->prepare($queary);

                $st->execute(
                    array(
                        ':a'=>null,
                        ':h'=>$this->user_id,
                        ':b'=>$this->title,
                        ':c'=>$this->fullname,
                        ':d'=>$this->desc,
                        ':e'=>$this->address,

                        ':g'=>date('Y-m-d h:m:s')

                    )
                );
            }else{
                $queary = "INSERT INTO `settings` (`id`, `user_id`,`title`,`fullname`,`description`,`address`,`featured_img`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:f,:g)";

                $st = $this->pdo->prepare($queary);

                $st->execute(
                    array(
                        ':a'=>null,
                        ':h'=>$this->user_id,
                        ':b'=>$this->title,
                        ':c'=>$this->fullname,
                        ':d'=>$this->desc,
                        ':e'=>$this->address,
                        ':f'=>$this->img,
                        ':g'=>date('Y-m-d h:m:s')

                    )
                );

            }


            if($st){

                $_SESSION['msg']= "Successfully settings stored";


                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");
            }else{

                $_SESSION['msg']= " settings stored failed";

                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }
    public function update(){


          try {
              if(empty($this->img)) {


                  $query = "UPDATE settings SET title=:title,fullname=:fullname,description=:description,address=:address WHERE id=:id";


                  $stmt = $this->pdo->prepare($query);
                  $stmt->execute(
                      array(
                          ':id' => $this->id,
                          ':title' => $this->title,
                          ':fullname' => $this->fullname,
                          ':description' => $this->desc,
                          ':address' => $this->address

                      )
                  );
              }else{
                  $query = "UPDATE settings SET title=:title,fullname=:fullname,description=:description,address=:address,featured_img=:img WHERE id=:id";


                  $stmt = $this->pdo->prepare($query);
                  $stmt->execute(
                      array(
                          ':id' => $this->id,
                          ':title' => $this->title,
                          ':fullname'=>$this->fullname,
                          ':description' =>$this->desc,
                          ':address'=>$this->address,
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
            $query = "UPDATE settings SET deleted_at=:datetme WHERE id=:id";


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