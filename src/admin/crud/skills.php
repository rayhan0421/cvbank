<?php
namespace App\admin\skills;
use App\model\model;
Class skills extends model
{

    protected $id = '';
    protected $title='';
    protected $desc='';
    protected $level='';
    protected $experience='';
    protected $area='';


    public function setdata($data)
    {

        if (array_key_exists('id', $data)) {
           $this->id = $data['id'];
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

        session_start();
        try {
            $query = "UPDATE skills SET title=:title,description=:desc WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->auto_id,
                    ':title' => $this->title,
                    ':desc'=>$this->desc
                )
            );
            if($stmt){

                $_SESSION['msg'] ="succesfully updated ";

                header("location:http://localhost/cvbank/views/admin");

            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }


    }

    public function delete(){
        try {
            $query = "UPDATE skills SET deleted_at=:datetme WHERE id=:id";


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
                header("location:http://localhost/cvbank/views/admin/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}