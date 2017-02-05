<?php
namespace App\experience;
use App\model\model;
Class experience extends model
{
    protected $id='';
    protected $designation='';
    protected $company_name='';
    protected $start_date='';
    protected $end_date='';
    protected $company_location='';



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

            if(array_key_exists('designation',$data))  {
                $this->designation= $data['designation'];
            }
            if(array_key_exists('company_name',$data))  {
                $this->company_name= $data['company_name'];
            }

            if(array_key_exists('start_date',$data))  {
                $this->start_date= $data['start_date'];
            }

            if(array_key_exists('end_date',$data))  {
                $this->end_date= $data['end_date'];
            }

            if(array_key_exists('company_location',$data))  {
                $this->company_location= $data['company_location'];
            }
        }

        return $this;


    }



public function index(){


    $queary = "SELECT  experiences.id as exid, experiences.*, users.* FROM  experiences JOIN users ON users.id = experiences.user_id WHERE users.id=$this->id AND  experiences.deleted_at='0000-00-00 00:00:00'";

    $st = $this->pdo->prepare($queary);

    $st->execute();

    $stu= $st->fetchAll();

    return $stu;

}
    public function store(){



        try{
            $queary = "INSERT INTO `experiences` (`id`, `user_id`,`designation`,`company_name`,`start_date`,`end_date`,`company_location`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:f,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a'=>null,
                    ':h'=>$this->id,
                    ':b'=>$this->designation,
                    ':c'=>$this->company_name,
                    ':d'=>$this->start_date,
                    ':e'=>$this->end_date,
                    ':f'=>$this->company_location,
                    ':g'=>date('Y-m-d h:m:s')

                )
            );


            session_start();
            if($st){

                $_SESSION['msg']= "Successfully added espariance";


                header("location:http://localhost/cvbank/views/experience/create.php");
            }else{

                $_SESSION['msg']= "experience creation failed";

                header("location:http://localhost/cvbank/views/experience/create.php");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }
    public function update(){


        try {
            $query = "UPDATE experiences SET designation=:designation,company_name=:company_name, company_location=:company_location WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->auto_id,
                    ':designation' => $this->designation,
                    ':company_name'=>$this->company_name,
                    ':company_location'=>$this->company_location
                )
            );
            if($stmt){

                $_SESSION['msg'] ="succesfully updated ";

                header("location:http://localhost/cvbank/views/experience");

            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public  function trash()
    {

        try {
            $query = "UPDATE experiences SET deleted_at=:datetme WHERE id=:id";


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
                header("location:http://localhost/cvbank/views/experience/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function trashlist(){

        $queary = "SELECT  experiences.* FROM  experiences JOIN users ON users.id = experiences.user_id WHERE users.id=$this->id AND  experiences.deleted_at!='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }

    public function show(){


        $queary = "SELECT  * FROM  experiences WHERE id=$this->auto_id";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetch();

        return $stu;
    }
    public function restore(){

        try {
            $query = "UPDATE experiences SET deleted_at=:datetme WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' =>$this->auto_id,
                    ':datetme'=>'0000-00-00 00:00:00'
                )
            );

            if($stmt){


                $_SESSION['message'] ="succesfully restore ";
                header("location:http://localhost/cvbank/views/experience/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}