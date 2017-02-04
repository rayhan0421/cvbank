<?php
namespace App\home\search;
use App\model\model;
Class search extends model
{
    protected $keyword='';

    // if you use constructor here
    // use this parent::__construct();

    public function setdata($data)
    {



        if (array_key_exists('keyword', $data)) {
            $this->keyword = $data['keyword'];
        }

        $this->filterdata();
    }

    public function search(){

        $queary = "SELECT users.id as userid ,abouts.* users.* FROM abouts JOIN users ON users.id = abouts.user_id WHERE users.user_role!=2 AND users.is_active=1";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }

    protected function filterdata(){
        $this->keyword= filter_var($this->keyword,FILTER_SANITIZE_STRIPPED);
    }
}


