<?php
namespace App\admin\crud\experiences;
use App\model\model;
Class experiences extends model
{

    protected $id = '';
    protected $designation='';
    protected $company_name='';
    protected $start_date='';
    protected $end_date='';
    protected $company_location='';
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

        if(array_key_exists('level',$data))  {
            $this->level= $data['level'];
        }

        if(array_key_exists('experience',$data))  {
            $this->experience= $data['experience'];
        }

        if(array_key_exists('area',$data))  {
            $this->area= $data['area'];
        }
    }

    public function update(){


         try {
            $query = "UPDATE experiences SET title=:title,description=:desc,level=:levell,experience=:exp,experience_area=:area WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->id,
                    ':title' => $this->title,
                    ':desc'=>$this->desc,
                    ':exp' =>$this->experience,
                    ':levell'=>$this->level,
                    ':area'=>$this->area
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
            $query = "UPDATE experiences SET deleted_at=:datetme WHERE id=:id";


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