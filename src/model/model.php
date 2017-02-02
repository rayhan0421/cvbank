<?php
namespace App\model;
use PDO;
Class model {

    protected $pdo=null;
    protected $db='cvbank';
    protected $dbuser='root';
    protected $dbpass='';
    protected $host = 'localhost';

    public function __construct()
    {

        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db", $this->dbuser, $this->dbpass);
        }catch( PDOException $Exception ) {
            // Note The Typecast To An Integer!
            throw new Exception( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
        }
    }
}