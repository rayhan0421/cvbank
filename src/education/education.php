<?php
namespace App\education;
use App\model\model;
Class education extends model{

    protected $id='';
    protected $title='';
    protected $institute='';
    protected $result='';
    protected $passing_year='';
    protected $main_subject='';
    protected $education_board='';
    protected $course_duration='';
    // if you use constructor here
    // use this parent::__construct();

    public function setdata($data){


        if( isset($data[0])){
            if(array_key_exists('id',$data[0]))  {
                $this->id= $data[0]['id'];
            }
        }else{

            if(array_key_exists('id',$data))  {
                $this->auto_id= $data['id'];
            }

            if(array_key_exists('user_id',$data))  {
                $this->id= $data['user_id'];
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

        return $this;


    }

    public function index(){


        $queary = "SELECT  educations.id as eduid, educations.*, users.* FROM  educations JOIN users ON users.id = educations.user_id WHERE users.id=$this->id AND  educations.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;

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

                $_SESSION['msg']= "Successfully added educations Information";


                header("location:http://localhost/cvbank/views/education/create.php");
            }else{

                $_SESSION['msg']= "skill creation failed";

                header("location:http://localhost/cvbank/views/education/create.php");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }

    public function update(){

        session_start();
        try {
            $query = "UPDATE educations SET title=:title,institute=:institute,result=:result,passing_year=:passing_year,main_subject=:main_subject,education_board=:education_board,course_duration=:course_duration WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->auto_id,
                    ':title' => $this->title,
                    ':institute'=>$this->institute,
                    ':result'=>$this->result,
                    ':passing_year'=>$this->passing_year,
                    ':main_subject'=>$this->main_subject,
                    ':education_board'=>$this->education_board,
                    ':course_duration'=>$this->course_duration,
                )
            );
            if($stmt){

                $_SESSION['msg'] ="succesfully updated ";

                header("location:http://localhost/cvbank/views/education");

            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public  function trash()
    {

        try {
            $query = "UPDATE educations SET deleted_at=:datetme WHERE id=:id";


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
                header("location:http://localhost/cvbank/views/education/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function trashlist(){

        $queary = "SELECT  educations.* FROM  educations JOIN users ON users.id = educations.user_id WHERE users.id=$this->id AND  educations.deleted_at!='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }

    public function show(){


        $queary = "SELECT  * FROM  educations WHERE id=$this->auto_id";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetch();

        return $stu;
    }

    public function restore(){

        try {
            $query = "UPDATE educations SET deleted_at=:datetme WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' =>$this->auto_id,
                    ':datetme'=>'0000-00-00 00:00:00'
                )
            );

            if($stmt){


                $_SESSION['message'] ="succesfully restore ";
                header("location:http://localhost/cvbank/views/education/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }



}


