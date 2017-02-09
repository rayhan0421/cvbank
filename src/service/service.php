<?php
namespace App\service;
use App\model\model;
Class service extends model
{

    protected $id = '';
    protected $title = '';
    protected $desc = '';
    protected $img= '';

    // if you use constructor here
    // use this parent::__construct();

    public function setdata($data)
    {


        if (isset($data[0])) {
            if (array_key_exists('id', $data[0])) {
                $this->id = $data[0]['id'];
            }
        } else {

            if (array_key_exists('id', $data)) {
                $this->auto_id = $data['id'];
            }

            if (array_key_exists('user_id', $data)) {
                $this->id = $data['user_id'];
            }

            if (array_key_exists('title', $data)) {
                $this->title = $data['title'];
            }
            if (array_key_exists('desc', $data)) {
                $this->desc = $data['desc'];
            }
            if (array_key_exists('img', $data)) {
                $this->img = $data['img'];
            }



        }

//        return $this;


    }
    public function store(){


        try{
            $queary = "INSERT INTO `services` (`id`, `user_id`,`title`,`description`,`img`,`created_at`) VALUES (:a,:h,:b,:c,:d,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a'=>null,
                    ':h'=>$this->id,
                    ':b'=>$this->title,
                    ':c'=>$this->desc,
                    ':d'=>$this->img,
                    ':g'=>date('Y-m-d h:m:s')

                )
            );

//            echo "<pre>";
//            var_dump($st);
//            die();

            session_start();
            if($st){

                $_SESSION['msg']= "Successfully added service";


                header("location:http://localhost/cvbank/views/service/create.php");
            }else{

                $_SESSION['msg']= "Added service failed";

                header("location:http://localhost/cvbank/views/service/create.php");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }
    public function index(){


        $queary = "SELECT  services.id as sid, services.*, users.* FROM  services JOIN users ON users.id = services.user_id WHERE users.id=$this->id AND  services.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;

    }
    public  function trash()
    {

        try {
            $query = "UPDATE services SET deleted_at=:datetme WHERE id=:id";


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
                header("location:http://localhost/cvbank/views/service/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function show(){


        $queary = "SELECT  * FROM  services WHERE id=$this->auto_id";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetch();

        return $stu;
    }

    public function update(){


        session_start();
        try {
            if(empty($this->img)){
                $query = "UPDATE services SET title=:title,description=:descc WHERE id=:id";


                $stmt = $this->pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':id' => $this->auto_id,
                        ':title' => $this->title,
                        ':descc'=>$this->desc

                    )
                );
            }else{
                $query = "UPDATE services SET title=:title,description=:descc,img=:img WHERE id=:id";


                $stmt = $this->pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':id' => $this->auto_id,
                        ':title' => $this->title,
                        ':descc'=>$this->desc,
                        ':img'=>$this->img
                    )
                );

            }

//            var_dump($stmt);
//                die();
            if($stmt){

                $_SESSION['msg'] ="succesfully updated ";

                header("location:http://localhost/cvbank/views/service");

            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public function trashlist(){

        $queary = "SELECT  services.* FROM  services JOIN users ON users.id = services.user_id WHERE users.id=$this->id AND  services.deleted_at!='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }

    public function restore()
    {

        try {
            $query = "UPDATE services SET deleted_at=:datetme WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->auto_id,
                    ':datetme' => '0000-00-00 00:00:00'
                )
            );

            if ($stmt) {


                $_SESSION['message'] = "succesfully restored ";
                header("location:http://localhost/cvbank/views/service/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


}

