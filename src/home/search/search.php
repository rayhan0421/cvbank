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

        filterdata();
    }

    public function search(){

    }

    public function filterdata(){
        $this->keyword= filter_var($this->keyword,FILTER_SANITIZE_STRIPPED);
    }
}


