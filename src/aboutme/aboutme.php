<?php
namespace App\aboutme;
use App\model\model;
Class aboutme extends model{

   protected $id="";
   protected $title='';
   protected $phone='';
   protected $bio = '';

 // if you use constructor here
  // use this parent::__construct();
    public function setdata($data)
    {
        if (isset($data)) {
            if (array_key_exists('id', $data)) {
                $this->id = $data['id'];
            }
            if (array_key_exists('title', $data)) {
                $this->title = $data['title'];
            }
            if (array_key_exists('phone', $data)) {
                $this->phone = $data['phone'];
            }
            if (array_key_exists('bio', $data)) {
                $this->bio = $data['bio'];
            }
        }

        if (isset($data[0])) {
            if (array_key_exists('id', $data[0])) {
                $this->id = $data[0]['id'];
            }
        }

     $this->validate();
    }
 public function index(){



    $queary = "select * from abouts where abouts.user_id=$this->id";

     $st = $this->pdo->prepare($queary);

     $st->execute();


     $stu= $st->fetch();

     return $stu;


  }

  public function store(){

   $id =$_SESSION['userinfo'][0]['id'];

      $queary = "INSERT INTO `abouts` (`id`,`user_id`,`title`,`phone`,`bio`,`created_at`) VALUES (:a,:b,:c,:d,:e,:f);";

      $st = $this->pdo->prepare($queary);

      $st->execute(
          array(
              ':a'=>null,
              ':b'=>$id,
              ':c'=>$this->title,
              ':d'=>$this->phone,
              ':e'=>$this->bio,
              ':f'=>date('Y-m-d h:m:s')

          )
      );



      if($st){

          $_SESSION['msg']= "Successfully added aboute";


          header("location:http://localhost/cvbank/views/aboutme");
      }else{

          $_SESSION['msg']= "aboute creation failed";

          header("location:http://localhost/cvbank/views/aboutme");

      }


  }

  public function update(){
      try {
          $query = "UPDATE abouts SET title=:title,phone=:phone,bio=:bio WHERE id=:id";


          $stmt = $this->pdo->prepare($query);
          $stmt->execute(
              array(
                  ':id' => $this->id,
                  ':title' => $this->title,
                  ':phone'=>$this->phone,
                   ':bio'=>$this->bio
              )
          );
          if($stmt){

              $_SESSION['msg'] ="succesfully updated ";

              header("location:http://localhost/cvbank/views/aboutme");

          }
      } catch (PDOException $e) {
          echo 'Error: ' . $e->getMessage();
      }

  }

  protected function validate(){


    $this->title= filter_var($this->title,FILTER_SANITIZE_STRIPPED);
    $this->phone= filter_var($this->phone,FILTER_SANITIZE_STRIPPED);
    $this->bio = filter_var($this->bio,FILTER_SANITIZE_STRIPPED);

  }


 }


