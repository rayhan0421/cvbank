<?php
namespace App\admin\crud\educations;
use App\model\model;
Class educations extends model
{

    protected $id = '';
    protected $title='';
    protected $institute='';
    protected $result='';
    protected $passing_year='';
    protected $main_subject='';
    protected $education_board='';
    protected $course_duration='';
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
        if(array_key_exists('institute',$data))  {
            $this->institute= $data['institute'];
        }

        if(array_key_exists('result',$data))  {
            $this->result= $data['result'];
        }

        if(array_key_exists('passing_year',$data))  {
            $this->passing_year= $data['passing_year'];
        }

        if(array_key_exists('main_subject',$data))  {
            $this->main_subject= $data['main_subject'];
        }
        if(array_key_exists('education_board',$data))  {
            $this->education_board= $data['education_board'];
        }
        if(array_key_exists('course_duration',$data))  {
            $this->course_duration= $data['course_duration'];
        }
    }
    public function store(){


        try{
            $queary = "INSERT INTO `educations` (`id`, `user_id`,`title`,`institute`,`result`,`passing_year`,`main_subject`,`education_board`,`course_duration`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:f,:g,:i,:j);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a'=>null,
                    ':h'=>$this->id,
                    ':b'=>$this->title,
                    ':c'=>$this->institute,
                    ':d'=>$this->result,
                    ':e'=>$this->passing_year,
                    ':f'=>$this->main_subject,
                    ':g'=>$this->education_board,
                    ':i'=>$this->course_duration,
                    ':j'=>date('Y-m-d h:m:s')

                )
            );


            session_start();
            if($st){

                $_SESSION['msg']= "Successfully added edication";



                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->id");
            }else{

                $_SESSION['msg']= "education creation failed";


                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->id");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }
    public function update(){


         try {
            $query = "UPDATE educations SET title=:title,description=:desc,level=:levell,experience=:exp,experience_area=:area WHERE id=:id";


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
            $query = "UPDATE educations SET deleted_at=:datetme WHERE id=:id";


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