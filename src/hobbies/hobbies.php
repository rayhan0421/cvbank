<?php
namespace App\hobbies;
use App\model\model;
Class hobbies extends model
{
    protected $auto_id= '';
    protected $id = '';
    protected $title = '';
    protected $description = '';
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
            if (array_key_exists('description', $data)) {
                $this->description = $data['description'];
            }
            if (array_key_exists('img', $data)) {
                $this->img = $data['img'];
            }



        }

//        return $this;


    }
    public function store(){


        try{
            $queary = "INSERT INTO `hobbies` (`id`, `user_id`,`title`,`description`,`img`,`created_at`) VALUES (:a,:h,:b,:c,:d,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a'=>null,
                    ':h'=>$this->id,
                    ':b'=>$this->title,
                    ':c'=>$this->description,
                    ':d'=>$this->img,
                    ':g'=>date('Y-m-d h:m:s')

                )
            );

//            echo "<pre>";
//            var_dump($st);
//            die();

            session_start();
            if($st){

                $_SESSION['msg']= "Successfully added hobbies";


                header("location:http://localhost/cvbank/views/hobbies/create.php");
            }else{

                $_SESSION['msg']= "Added hobbies failed";

                header("location:http://localhost/cvbank/views/hobbies/create.php");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }
    public function index(){


        $queary = "SELECT  hobbies.id as hid, hobbies.*, users.* FROM  hobbies JOIN users ON users.id = hobbies.user_id WHERE users.id=$this->id AND  hobbies.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;

    }
    public  function trash()
    {

        try {
            $query = "UPDATE hobbies SET deleted_at=:datetme WHERE id=:id";


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
                header("location:http://localhost/cvbank/views/hobbies/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function show(){


        $queary = "SELECT  * FROM  hobbies WHERE id=$this->auto_id";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetch();

        return $stu;
    }

    public function update(){


        try {

            if(empty($this->img)){
                $query = "UPDATE hobbies SET title=:title,description=:item WHERE id=:id";


                $stmt = $this->pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':id' => $this->auto_id,
                        ':title' => $this->title,
                        ':item'=>$this->description,

                    )
                );

            }else{
                $query = "UPDATE hobbies SET title=:title,description=:item,img=:img WHERE id=:id";


                $stmt = $this->pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':id' => $this->auto_id,
                        ':title' => $this->title,
                        ':item'=>$this->description,
                        ':img'=>$this->img
                    )
                );

            }


            if($stmt){

                $_SESSION['msg'] ="succesfully updated ";

                header("location:http://localhost/cvbank/views/hobbies");

            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public function trashlist(){

        $queary = "SELECT  hobbies.* FROM  hobbies JOIN users ON users.id = hobbies.user_id WHERE users.id=$this->id AND  hobbies.deleted_at!='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }

    public function restore()
    {

        try {
            $query = "UPDATE hobbies SET deleted_at=:datetme WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->auto_id,
                    ':datetme' => '0000-00-00 00:00:00'
                )
            );

            if ($stmt) {


                $_SESSION['message'] = "succesfully restored ";
                header("location:http://localhost/cvbank/views/hobbies/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


}

