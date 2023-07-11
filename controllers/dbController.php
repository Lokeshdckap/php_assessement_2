<?php
 require 'models/database.php';
class dbController{

    private $dbModel;
     
 // construct instace of the model class
    public function __construct() {
        $this->dbModel = new Database();

    }
// load the view file

    public function index(){
     
        return require 'views/index.php';
    }

    // create the database controllers
    public function create(){



        $this->dbModel->create($_POST['dbName']);
          
    }
    // fecth the all datas
    public function read(){
        $details =  $this->dbModel->read();
        require 'views/index.php';
     }
// create a rows
    public function rows(){
        $details =  $this->dbModel->read();
        require 'views/index.php';

    }
// create a table 
   
     public function createTable(){
          $this->dbModel->createTable();
    }
// create a columns 

    public function createColumn(){
        $this->dbModel->createColumns();
    }
// tablelist controller using ajax request


    public function tableListUsingAjax(){   
        
        $tables = array_keys($_REQUEST)[0];
         $this->dbModel->tableList($tables);
       }
    
       // columnlist controller using ajax request
    public function columnListUsingAjax(){  
        

        $column = array_values($_REQUEST)[0];
    
        $database = array_values($_REQUEST)[1];

        $this->dbModel->columnList($database,$column);
       }

       // insert controller

    public function insertData(){  
        $this->dbModel->storeData($_POST);
    }

}