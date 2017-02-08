<?php
namespace App\settings;
use App\model\model;
Class settings extends model
{

    protected $id = '';
    protected $title = '';
    protected $fullname = '';
    protected $description = '';
    protected $address = '';
    protected $featured_img = '';
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
            if (array_key_exists('fullname', $data)) {
                $this->fullname = $data['fullname'];
            }

            if (array_key_exists('description', $data)) {
                $this->description = $data['description'];
            }

            if (array_key_exists('address', $data)) {
                $this->address = $data['address'];
            }

            if (array_key_exists('featured_img', $data)) {
                $this->featured_img = $data['featured_img'];
            }
        }

        return $this;


    }

    public function index()
    {


        $queary = "SELECT  settings.id as stid, settings.*, users.* FROM  settings JOIN users ON users.id = settings.user_id WHERE users.id=$this->id AND  settings.deleted_at='0000-00-00 00:00:00' ORDER BY `settings`.`id` DESC LIMIT 1";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu = $st->fetch();

        return $stu;

    }

    public function store(){



        try{
            if(empty($this->featured_img)){
                $queary = "INSERT INTO `settings` (`id`, `user_id`,`title`,`fullname`,`description`,`address`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:g)";

                $st = $this->pdo->prepare($queary);

                $st->execute(
                    array(
                        ':a'=>null,
                        ':h'=>$this->id,
                        ':b'=>$this->title,
                        ':c'=>$this->fullname,
                        ':d'=>$this->description,
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
                        ':h'=>$this->id,
                        ':b'=>$this->title,
                        ':c'=>$this->fullname,
                        ':d'=>$this->description,
                        ':e'=>$this->address,
                        ':f'=>$this->featured_img,
                        ':g'=>date('Y-m-d h:m:s')

                    )
                );

            }


            session_start();
            if($st){

                $_SESSION['msg']= "Successfully settings stored";


                header("location:http://localhost/cvbank/views/settings/");
            }else{

                $_SESSION['msg']= " settings stored failed";

                header("location:http://localhost/cvbank/views/settings/");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }

    public function update(){


        try {
            if(empty($this->featured_img)){
                //$query = "UPDATE settings SET title=:title,fullname=:fullname,description=:description,address=:address,featured_img=:featured_img WHERE id=:id";
                $query="UPDATE `settings` SET `title` =:title , `fullname` =:fname, `description` =:description, `address` =:address WHERE `settings`.`id` =:id;";

                $stmt = $this->pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':id' => $this->auto_id,
                        ':title' => $this->title,
                        ':fname'=>$this->fullname,
                        ':description'=>$this->description,
                        ':address'=>$this->address

                    )
                );

            }else{
                //$query = "UPDATE settings SET title=:title,fullname=:fullname,description=:description,address=:address,featured_img=:featured_img WHERE id=:id";
                $query="UPDATE `settings` SET `title` =:title , `fullname` =:fname, `description` =:description, `address` =:address, `featured_img` =:featured_img WHERE `settings`.`id` =:id;";

                $stmt = $this->pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':id' => $this->auto_id,
                        ':title' => $this->title,
                        ':fname'=>$this->fullname,
                        ':description'=>$this->description,
                        ':address'=>$this->address,
                        ':featured_img'=>$this->featured_img
                    )
                );

            }



            if($stmt){

                $_SESSION['msg'] ="succesfully updated ";

       header("location:http://localhost/cvbank/views/settings");

            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public  function trash()
    {

        try {
            $query = "UPDATE settings SET deleted_at=:datetme WHERE id=:id";


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
                header("location:http://localhost/cvbank/views/settings/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function trashlist(){

        $queary = "SELECT  settings.* FROM  settings JOIN users ON users.id = settings.user_id WHERE users.id=$this->id AND  settings.deleted_at!='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }

    public function show(){


        $queary = "SELECT  * FROM  settings WHERE id=$this->auto_id";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetch();

        return $stu;
    }
//
    public function restore(){

        try {
            $query = "UPDATE settings SET deleted_at=:datetme WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' =>$this->auto_id,
                    ':datetme'=>'0000-00-00 00:00:00'
                )
            );

            if($stmt){


                $_SESSION['message'] ="succesfully restore ";
                header("location:http://localhost/cvbank/views/settings/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


}

