<?php
namespace App\home\search;
use App\model\model;
Class search extends model
{
    protected $keyword='';

    // if you use constructor here
    // use this parent::__construct();
   protected $abtitle='';
   protected $sktitle ='';
   protected $skexp = '';

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

    public function search(){

        $queary = "SELECT  users.id as uid, abouts.title as ab_title, abouts.bio as ab_bio, educations.title as edu_title , settings.fullname as se_fullname , settings.featured_img as fimg ,skills.experience as sk_exp , skills.title as sk_title FROM `users` INNER JOIN abouts ON users.id = abouts.user_id JOIN educations on users.id = educations.user_id JOIN settings ON users.id = settings.user_id JOIN skills ON users.id = skills.user_id WHERE abouts.title LIKE '%$this->keyword%' OR skills.title like '%$this->keyword%' OR skills.experience LIKE '%$this->keyword%' AND users.is_active=1";

        $st = $this->pdo->prepare($queary);

        $st->execute();

        $stu= $st->fetchAll();

        return $stu;
    }

    protected function filterdata(){
        $this->keyword= filter_var($this->keyword,FILTER_SANITIZE_STRIPPED);
    }
}


