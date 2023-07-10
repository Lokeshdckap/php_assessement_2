<?php
 require 'models/database.php';
class dbController{

    private $dbModel;
     

    public function __construct() {
        $this->dbModel = new Database();

    }


    public function index(){
     
        return require 'views/index.php';
    }

    public function create(){



        $this->dbModel->create($_POST['dbName']);
          
    }
    public function read(){
        $details =  $this->dbModel->read();
        require 'views/index.php';
     }

   
     public function createTable(){
          $this->dbModel->createTable();
    }


    public function createColumn(){
        $this->dbModel->createColumns();
    }

    public function tableListUsingAjax(){   
        
        // $tables = array_keys($_REQUEST)[0];
         $this->dbModel->tableList();
        
        //   var_dump($_SESSION['details']);
       }

}