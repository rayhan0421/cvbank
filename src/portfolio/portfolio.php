<?php
namespace App\Portfolio;
use App\model\model;
Class Portfolio extends model{

    protected $id='';
    protected $title='';
    protected $description='';
    protected $img='';
    protected $category='';
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
            if(array_key_exists('description',$data))  {
                $this->description= $data['description'];
            }

            if(array_key_exists('img',$data))  {
                $this->img= $data['img'];
            }



            if(array_key_exists('category',$data))  {
                $this->category= $data['category'];
            }
        }

        return $this;


    }

    public function index(){


        $queary = "SELECT  portfolios.id as portid, portfolios.*, users.* FROM  portfolios JOIN users ON users.id = portfolios.user_id WHERE users.id=$this->id AND  portfolios.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;

    }


    public function store(){



        try{
            $queary = "INSERT INTO `Portfolios` (`id`, `user_id`,`title`,`description`,`img`,`category`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a'=>null,
                    ':h'=>$this->id,
                    ':b'=>$this->title,
                    ':c'=>$this->description,
                    ':d'=>$this->img,
                    ':e'=>$this->category,
                    ':g'=>date('Y-m-d h:m:s')

                )
            );


            session_start();
            if($st){

                $_SESSION['msg']= "Successfully added Portfolio";


                header("location:http://localhost/cvbank/views/Portfolio/create.php");
            }else{

                $_SESSION['msg']= "skill creation failed";

                header("location:http://localhost/cvbank/views/Portfolio/create.php");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }

    public function update(){

        session_start();
        try {
          if(empty($this->img)){
              $query = "UPDATE Portfolios SET title=:title,description=:description, category=:category WHERE id=:id";


              $stmt = $this->pdo->prepare($query);
              $stmt->execute(
                  array(
                      ':id' => $this->auto_id,
                      ':title' => $this->title,
                      ':description'=>$this->description,
                      ':category'=>$this->category
                  )
              );
          }else{
              $query = "UPDATE Portfolios SET title=:title,description=:description, category=:category,img=:img WHERE id=:id";


              $stmt = $this->pdo->prepare($query);
              $stmt->execute(
                  array(
                      ':id' => $this->auto_id,
                      ':title' => $this->title,
                      ':description'=>$this->description,
                      ':category'=>$this->category,
                      ':img'=>$this->img
                  )
              );
          }
            if($stmt){

                $_SESSION['msg'] ="succesfully updated ";

                header("location:http://localhost/cvbank/views/Portfolio");

            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public  function trash()
    {

        try {
            $query = "UPDATE Portfolios SET deleted_at=:datetme WHERE id=:id";


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
                header("location:http://localhost/cvbank/views/Portfolio/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function trashlist(){

        $queary = "SELECT  Portfolios.* FROM  Portfolios JOIN users ON users.id = Portfolios.user_id WHERE users.id=$this->id AND  Portfolios.deleted_at!='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }

    public function show(){


        $queary = "SELECT  * FROM  Portfolios WHERE id=$this->auto_id";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetch();

        return $stu;
    }

    public function restore(){

        try {
            $query = "UPDATE Portfolios SET deleted_at=:datetme WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' =>$this->auto_id,
                    ':datetme'=>'0000-00-00 00:00:00'
                )
            );

            if($stmt){


                $_SESSION['message'] ="succesfully restore ";
                header("location:http://localhost/cvbank/views/Portfolio/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }



}


