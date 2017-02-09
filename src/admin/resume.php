<?php
namespace App\admin;
use App\model\model;
Class resume extends model{


    protected $id='';

    // if you use constructor here
    // use this parent::__construct();

    public function setdata($data)
    {



            if (array_key_exists('id', $data)) {
                $this->id = $data['id'];
            }


    }

    public function about(){
        $queary = "SELECT  abouts.id as aboutid ,abouts.* , users.email as umail FROM abouts JOIN users ON users.id = abouts.user_id WHERE users.user_role!=2 AND user_id=$this->id AND abouts.deleted_at='0000-00-00 00:00:00' ORDER BY `abouts`.`id` DESC Limit 1";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetch();


        return $stu;




    }
    public function skill(){
        $queary = "SELECT  skills.id as skillid ,skills.* FROM skills JOIN users ON users.id =skills.user_id WHERE users.user_role!=2 AND user_id=$this->id AND skills.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }
    public function hobbies(){

      $queary = "SELECT  hobbies.id as hobbiesid ,hobbies.* FROM hobbies JOIN users ON users.id = hobbies.user_id WHERE users.user_role!=2 AND user_id=$this->id AND hobbies.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }
    public function facts(){
        $queary = "SELECT  facts.id as factsid ,facts.* FROM facts JOIN users ON users.id = facts.user_id WHERE users.user_role!=2 AND user_id=$this->id AND facts.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }

    public function portfolio(){
        $queary = "SELECT  portfolios.id as portfoliosid ,portfolios.* FROM portfolios JOIN users ON users.id = portfolios.user_id WHERE users.user_role!=2 AND user_id=$this->id AND portfolios.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }
    public function post(){
        $queary = "SELECT  posts.id as postsid ,posts.* FROM posts JOIN users ON users.id = posts.user_id WHERE users.user_role!=2 AND user_id=$this->id AND posts.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }
    public function settings(){
        $queary = "SELECT  settings.id as settingsid ,settings.* FROM settings JOIN users ON users.id = settings.user_id WHERE users.user_role!=2 AND user_id=$this->id AND settings.deleted_at='0000-00-00 00:00:00' ORDER BY `settings`.`id` DESC limit 1";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetch();

        return $stu;
    }
    public function service(){
        $queary = "SELECT  services.id as servicesid ,services.* FROM services JOIN users ON users.id = services.user_id WHERE users.user_role!=2 AND user_id=$this->id AND services.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }
    public function experience(){
        $queary = "SELECT  experiences.id as experiencesid ,experiences.* FROM experiences JOIN users ON users.id = experiences.user_id WHERE users.user_role!=2 AND user_id=$this->id AND experiences.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }
    public function award(){
        $queary = "SELECT  awards.id as awardsid ,awards.* FROM awards JOIN users ON users.id = awards.user_id WHERE users.user_role!=2 AND user_id=$this->id AND awards.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }
    public function education(){
        $queary = "SELECT  educations.id as educationsid ,educations.* FROM educations JOIN users ON users.id = educations.user_id WHERE users.user_role!=2 AND user_id=$this->id AND educations.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }
    public function contact(){
        $queary = "SELECT  contacts.id as contactsid ,contacts.* FROM contacts JOIN users ON users.id = contacts.user_id WHERE users.user_role!=2 AND user_id=$this->id AND contacts.deleted_at='0000-00-00 00:00:00'";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }


}