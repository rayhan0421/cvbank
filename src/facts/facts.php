<?php
namespace App\facts;
use App\model\model;
Class facts extends model
{

    protected $id = '';
    protected $title = '';
    protected $none_of_item = '';
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
            if (array_key_exists('item', $data)) {
                $this->none_of_item = $data['item'];
            }
            if (array_key_exists('img', $data)) {
                $this->img = $data['img'];
            }



        }

//        return $this;


    }
    public function store(){


        try{
            $queary = "INSERT INTO `facts` (`id`, `user_id`,`title`,`no_of_items`,`img`,`created_at`) VALUES (:a,:h,:b,:c,:d,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a'=>null,
                    ':h'=>$this->id,
                    ':b'=>$this->title,
                    ':c'=>$this->none_of_item,
                    ':d'=>$this->img,
                    ':g'=>date('Y-m-d h:m:s')

                )
            );

//            echo "<pre>";
//            var_dump($st);
//            die();

            session_start();
            if($st){

                $_SESSION['msg']= "Successfully added facts";


                header("location:http://localhost/cvbank/views/facts/create.php");
            }else{

                $_SESSION['msg']= "Added facts failed";

                header("location:http://localhost/cvbank/views/facts/create.php");

            }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }


    }
    public function index(){


        $queary = "SELECT  facts.id as fid, facts.*, users.* FROM  facts JOIN users ON users.id = facts.user_id WHERE users.id=$this->id AND  facts.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;

    }
    public  function trash()
    {

        try {
            $query = "UPDATE facts SET deleted_at=:datetme WHERE id=:id";


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
                header("location:http://localhost/cvbank/views/facts/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function show(){


        $queary = "SELECT  * FROM  facts WHERE id=$this->auto_id";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetch();

        return $stu;
    }

    public function update(){


        session_start();
        try {
            if(empty($this->img)){
                $query = "UPDATE facts SET title=:title,no_of_items=:item WHERE id=:id";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':id' => $this->auto_id,
                        ':title' => $this->title,
                        ':item'=>$this->none_of_item

                    )
                );
            }else{
                $query = "UPDATE facts SET title=:title,no_of_items=:item,img=:img WHERE id=:id";
                $stmt = $this->pdo->prepare($query);
                $stmt->execute(
                    array(
                        ':id' => $this->auto_id,
                        ':title' => $this->title,
                        ':item'=>$this->none_of_item,
                        ':img'=>$this->img
                    )
                );
            }





//            var_dump($stmt);
//                die();
            if($stmt){

                $_SESSION['msg'] ="succesfully updated ";

                header("location:http://localhost/cvbank/views/facts");

            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public function trashlist(){

        $queary = "SELECT  facts.* FROM  facts JOIN users ON users.id = facts.user_id WHERE users.id=$this->id AND  facts.deleted_at!='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }

    public function restore()
    {

        try {
            $query = "UPDATE facts SET deleted_at=:datetme WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->auto_id,
                    ':datetme' => '0000-00-00 00:00:00'
                )
            );

            if ($stmt) {


                $_SESSION['message'] = "succesfully restored ";
                header("location:http://localhost/cvbank/views/facts/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


}

