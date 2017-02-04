<?php
namespace App\admin\crud\awards;
use App\model\model;
Class awards extends model
{

    protected $id = '';
    protected $title='';
    protected $oraganization='';
    protected $desc='';
    protected $location='';
    protected $year='';
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

        if(array_key_exists('organization',$data))  {
            $this->oraganization= $data['organization'];
        }

        if(array_key_exists('location',$data))  {
            $this->location= $data['location'];
        }

        if(array_key_exists('year',$data))  {
            $this->year= $data['year'];
        }
    }

    public function store(){


        try{
            $queary = "INSERT INTO `awards` (`id`, `user_id`,`title`,`organization`,`description`,`location`,`year`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:f,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a'=>null,
                    ':h'=>$this->user_id,
                    ':b'=>$this->title,
                    ':c'=>$this->oraganization,
                    ':d'=>$this->desc,
                    ':e'=>$this->location,
                    ':f'=>$this->year,
                    ':g'=>date('Y-m-d h:m:s')

                )
            );


            session_start();
            if($st){

                $_SESSION['msg']= "Successfully added award";


                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");
            }else{

                $_SESSION['msg']= "skill creation failed";

                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }



    }
    public function update(){


         try {
            $query = "UPDATE awards SET title=:title,organization=:org,description=:desc,location=:loc, year=:year WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->id,
                    ':title' => $this->title,
                    ':desc'=>$this->desc,
                    ':org' =>$this->oraganization,
                    ':loc'=>$this->location,
                    ':year'=>$this->year
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
            $query = "UPDATE awards SET deleted_at=:datetme WHERE id=:id";


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