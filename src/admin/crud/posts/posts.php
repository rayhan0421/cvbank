<?php
namespace App\admin\crud\posts;
use App\model\model;
Class posts extends model
{

    protected $id = '';
    protected $title = '';
    protected $desc = '';
    protected $tags = '';
    protected $categories = '';
    protected $auto_id = '';
    protected $user_id= '';



    public function setdata($data)
    {

        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }

        if (array_key_exists('user_id', $data)) {
            $this->user_id = $data['user_id'];
        }

        if (array_key_exists('title', $data)) {
            $this->title = $data['title'];
        }
        if (array_key_exists('desc', $data)) {
            $this->desc = $data['desc'];
        }

        if (array_key_exists('tags', $data)) {
            $this->tags = $data['tags'];
        }

        if (array_key_exists('categories', $data)) {
            $this->categories = $data['categories'];
        }
    }
    public function store()
    {


        try {
            $queary = "INSERT INTO `posts` (`id`, `user_id`,`title`,`description`,`tags`,`categories`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a' => null,
                    ':h' => $this->user_id,
                    ':b' => $this->title,
                    ':c' => $this->desc,
                    ':d' => $this->tags,
                    ':e' => $this->categories,
                    ':g' => date('Y-m-d h:m:s')

                )
            );


            session_start();
            if ($st) {

                $_SESSION['msg'] = "Successfully add post";


                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");
            } else {

                $_SESSION['msg'] = "post added failed";

                header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");

            }


        } catch (\PDOException $e) {

            echo "Error: " . $e->getTrace();
        }
    }
    public function update(){


         try {
             $query = "UPDATE `posts` SET `title` =:title, `description` =:desc, `tags` =:tags, `categories` =:categories WHERE `posts`.`id` =:id";


             $stmt = $this->pdo->prepare($query);
             $stmt->execute(
                 array(
                     ':id' => $this->id,
                     ':title' => $this->title,
                     ':desc' => $this->desc,
                     ':tags' => $this->tags,
                     ':categories' => $this->categories


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
            $query = "UPDATE posts SET deleted_at=:datetme WHERE id=:id";


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