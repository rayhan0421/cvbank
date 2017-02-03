<?php
namespace App\post;
use App\model\model;
Class post extends model
{

    protected $id = '';
    protected $title = '';
    protected $desc = '';
    protected $tags = '';
    protected $categories = '';
    protected $auto_id = '';

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

            if (array_key_exists('tags', $data)) {
                $this->tags = $data['tags'];
            }

            if (array_key_exists('categories', $data)) {
                $this->categories = $data['categories'];
            }


        }

        return $this;


    }

    public function index()
    {


        $queary = "SELECT  posts.id as pid, posts.*, users.* FROM  posts JOIN users ON users.id = posts.user_id WHERE users.id=$this->id AND  posts.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu = $st->fetchAll();

        return $stu;

    }


    public function store()
    {


        try {
            $queary = "INSERT INTO `posts` (`id`, `user_id`,`title`,`description`,`tags`,`categories`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:g);";

            $st = $this->pdo->prepare($queary);

            $st->execute(
                array(
                    ':a' => null,
                    ':h' => $this->id,
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


                header("location:http://localhost/cvbank/views/post/create.php");
            } else {

                $_SESSION['msg'] = "post added failed";

                header("location:http://localhost/cvbank/views/post/create.php");

            }


        } catch (\PDOException $e) {

            echo "Error: " . $e->getTrace();
        }
    }


    public function update()
    {
        session_start();
        try {
            $query = "UPDATE `posts` SET `title` =:title, `description` =:desc, `tags` =:tags, `categories` =:categories WHERE `posts`.`id` =:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->auto_id,
                    ':title' => $this->title,
                    ':desc' => $this->desc,
                    ':tags' => $this->tags,
                    ':categories' => $this->categories


                )
            );


            if ($stmt) {

                $_SESSION['msg'] = "succesfully updated post ";

                header("location:http://localhost/cvbank/views/post");

            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    public function trash()
    {

        try {
            $query = "UPDATE posts SET deleted_at=:datetme WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->auto_id,
                    ':datetme' => date('y-m-d h:m:s'),
                )
            );
            if ($stmt) {
                session_start();
                $_SESSION['msg'] = "succesfully deleted ";
                header("location:http://localhost/cvbank/views/post/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function trashlist()
    {

        $queary = "SELECT  posts.* FROM  posts JOIN users ON users.id = posts.user_id WHERE users.id=$this->id AND  posts.deleted_at!='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu = $st->fetchAll();

        return $stu;
    }

    public function show()
    {


        $queary = "SELECT  * FROM  posts WHERE id=$this->auto_id";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu = $st->fetch();

        return $stu;
    }


    public function restore()
    {

        try {
            $query = "UPDATE posts SET deleted_at=:datetme WHERE id=:id";


            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                array(
                    ':id' => $this->auto_id,
                    ':datetme' => '0000-00-00 00:00:00'
                )
            );

            if ($stmt) {


                $_SESSION['message'] = "succesfully restore post ";
                header("location:http://localhost/cvbank/views/post/index.php");
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}




