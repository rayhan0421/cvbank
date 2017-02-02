<?php
namespace App\users\signup;
use App\model\model;
Class signup extends model{

    protected $id="";
    protected $username='';
    protected $email ='';
    protected $password='';

    // if you use constructor here
    // use this parent::__construct();

    public function setdata($data=''){

      if(array_key_exists('usernamesignup',$data)){
          $this->username= $data['usernamesignup'];
      }

        if(array_key_exists('emailsignup',$data)){
            $this->email= $data['emailsignup'];
        }

        if(array_key_exists('passwordsignup',$data)){
            $this->password= $data['passwordsignup'];
        }

        $this->validate();

    }

    public function store(){


        try{
            $queary = "INSERT INTO `users` (`id`, `username`,`email`,`password`,`token`,`user_role`,`created_at`) VALUES (:a,:b,:c,:d,:e,:f,:g);";

            $st = $this->pdo->prepare($queary);
           $token = sha1($this->username);
            $st->execute(
                array(
                    ':a'=>null,
                    ':b'=>$this->username,
                    ':c'=>$this->email,
                    ':d'=>$this->password,
                    ':e'=>$token,
                    ':f'=>1,
                    ':g'=>date('Y-m-d h:m:s')

                )
            );

            session_start();
           if($st){

             $_SESSION['msg']= "Successfully Registered";

             $link =   "http://localhost/cvbank/views/login/emailvarifiy.php?token=$token";

             $msg = "please varify click link $link " ;

             mail($this->emai,"cvbank Email varification",$msg);
             header("location:http://localhost/cvbank/views/login/#tologin");
            }else{

              $_SESSION['msg']= "Registration failed";

             header("location:http://localhost/cvbank/views/login/#tologin");

           }

        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }

    }

    public function useravailabilty(){

      $quary = "select * from users WHERE (username='$this->username' OR email='$this->email')";

      $stm= $this->pdo->prepare($quary);

      $stm->execute();

      $data = $stm->fetchAll();


      return $data;
      }


    protected function validate(){

      $this->username = filter_var($this->username,FILTER_SANITIZE_STRIPPED);
      $this->email = filter_var($this->email,FILTER_SANITIZE_STRIPPED);




    }


}


