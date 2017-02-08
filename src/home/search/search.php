<?php
namespace App\home\search;
use App\model\model;
use PDO;
Class search extends model
{
    protected $keyword='';

    // if you use constructor here
    // use this parent::__construct();
   protected $abtitle='';
   protected $sktitle ='';
   protected $skexp = '';
   public $id='';
   public $perpage = 2;


    public function setdata($data)
    {

        if (array_key_exists('abtitle', $data)) {
            $this->abtitle = $data['abtitle'];
        }
        if (array_key_exists('sktitle', $data)) {
            $this->sktitle = $data['sktitle'];
        }
        if (array_key_exists('skexp', $data)) {
            $this->skexp  = $data['skexp'];
        }

        if (array_key_exists('keyword', $data)) {
            $this->keyword = $data['keyword'];
        }

        $this->filterdata();
    }

    public function search(&$rows,&$perpage,$currentpage,&$offset){

           $perpage = $this->perpage;
           $offset = ceil($this->perpage*$currentpage);
           $queary = "SELECT SQL_CALC_FOUND_ROWS users.id as uid, abouts.title as abtitle, abouts.bio as abbio from users JOIN abouts ON users.id = abouts.user_id WHERE abouts.title LIKE '%{$this->keyword}%' OR abouts.bio LIKE '%{$this->keyword}%' limit $this->perpage OFFSET $offset";
            $st = $this->pdo->prepare($queary);

            $st->execute();

            $stu = $st->fetchAll();
            $rows = $this->pdo->query("SELECT FOUND_ROWS()")->fetch(PDO::FETCH_COLUMN);
        return $stu;
    }

    public function newsearch(&$rows,&$perpage,$currentpage,&$offset){
        try{

            $perpage = $this->perpage;

            $offset = ceil($this->perpage*$currentpage);


            $queary = "SELECT SQL_CALC_FOUND_ROWS users.id as uid, abouts.title as abtitle, abouts.bio as abbio from users JOIN abouts ON users.id = abouts.user_id WHERE abouts.title LIKE '%$this->keyword%' OR abouts.bio LIKE '%$this->keyword%' limit $this->perpage OFFSET $offset";

            $st = $this->pdo->prepare($queary);

            $st->execute();

            $stu= $st->fetchAll();
            $rows = $this->pdo->query("SELECT FOUND_ROWS()")->fetch(PDO::FETCH_COLUMN);

            die();
            return $stu;





        }catch (\PDOException $e){

            echo "Error: ". $e->getTrace();
        }
    }

    protected function filterdata(){
        $this->keyword= filter_var($this->keyword,FILTER_SANITIZE_STRIPPED);
    }
}


