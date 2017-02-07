<?php
namespace App\admin\crud\experiences;
use App\model\model;
Class experiences extends model
{

    protected $id = '';
    protected $designation='';
    protected $company_name='';
    protected $start_date='';
    protected $end_date='';
    protected $company_location='';
    protected $user_id= '';


    public function setdata($data)
    {

        if(array_key_exists('id',$data))  {
            $this->id= $data['id'];
        }

        if(array_key_exists('user_id',$data))  {
            $this->user_id= $data['user_id'];
        }

        if(array_key_exists('designation',$data))  {
            $this->designation= $data['designation'];
        }
        if(array_key_exists('company_name',$data))  {
            $this->company_name= $data['company_name'];
        }

        if(array_key_exists('start_date',$data))  {
            $this->start_date= $data['start_date'];
        }

        if(array_key_exists('end_date',$data))  {
            $this->end_date= $data['end_date'];
        }

        if(array_key_exists('company_location',$data))  {
            $this->company_location= $data['company_location'];
        }

    }
  public function store(){

      $queary = "INSERT INTO `experiences` (`id`, `user_id`,`designation`,`company_name`,`start_date`,`end_date`,`company_location`,`created_at`) VALUES (:a,:h,:b,:c,:d,:e,:f,:g);";

      $st = $this->pdo->prepare($queary);

      $st->execute(
          array(
              ':a'=>null,
              ':h'=>$this->user_id,
              ':b'=>$this->designation,
              ':c'=>$this->company_name,
              ':d'=>$this->start_date,
              ':e'=>$this->end_date,
              ':f'=>$this->company_location,
              ':g'=>date('Y-m-d h:m:s')

          )
      );



      if($st){

          $_SESSION['msg']= "Successfully added aboute";



          header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");
      }else{

          $_SESSION['msg']= "aboute creation failed";


          header("location:http://localhost/cvbank/views/admin/userdetails.php?id=$this->user_id");

      }
  }
    public function update(){


         try {
             $query = "UPDATE experiences SET designation=:designation,company_name=:company_name, company_location=:company_location WHERE id=:id";


             $stmt = $this->pdo->prepare($query);
             $stmt->execute(
                 array(
                     ':id' => $this->auto_id,
                     ':designation' => $this->designation,
                     ':company_name'=>$this->company_name,
                     ':company_location'=>$this->company_location
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
            $query = "UPDATE experiences SET deleted_at=:datetme WHERE id=:id";


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