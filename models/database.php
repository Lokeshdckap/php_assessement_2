<?php

// Database Connection
class DB
{
    public $db;


    public function __construct($dd)

   
    {
        try {
            $this->db = new PDO
            (
                'mysql:host=127.0.0.1;dbname='."$dd".'',
                'admin',
                'welcome'
            );
        } catch (Exception $e) {
            die("connection error");
        }
    }
}

// Database Class Extends and Controllers Functions

class database extends DB{
    
    private $database;

    public function __construct(){
        $this->database = $_POST['databaseName'];
        parent::__construct($this->database);

    }
 // create a database function
    public function create($data) {
    
        $sql = "CREATE DATABASE $data";  
        $ins = $this->db->prepare($sql);
        $ins->execute();
        $_SESSION['sucess'] = "Database Create Sucessfully";
        header('location:/');
    }
// fetch the all database in phpmyadmin
    public function read(){
        $result = "SHOW DATABASES"; 
        $row =  $this->db->prepare($result);
        $row->execute();
        $details = $row->fetchAll();
        return $details;
     }
// create table function
     public function createTable(){
        $this->database = $_POST['databaseName'];
        $tablename = $_POST['tableNames'];

        if($tablename){
        $sql = "CREATE TABLE $tablename(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY
        )";
        $row =  $this->db->prepare($sql);
        $row->execute();
        header('location:/list');
        }

        $this->createColumns();
     }
// show the tables for particular database using ajax request
     public function tableList($data){

        $result = "SHOW TABLES FROM $data"; 
        $row =  $this->db->prepare($result);
        $row->execute();
        $details = $row->fetchAll();
        $allData = [];
        foreach($details as $detail){
            $allData[] = $detail['Tables_in_'.$data];

        }

        echo  json_encode($allData);

        
     }

// show the columns for particular table using ajax request

     public function columnList($dbs,$col){
       parent::__construct($dbs);
        $result = "SHOW COLUMNS FROM $col;"; 


        $statement =  $this->db->prepare($result);
        
         $statement->execute();
         $details = $statement->fetchAll();
        
        $allDatas = [];
        foreach($details as $key => $detail){
        $allDatas[$detail['Field']] = $detail['Type'];

        }
        echo json_encode($allDatas);


        
     }

     // create the columns functions 
     public function createColumns(){
        unset($_POST['databaseName']);
        unset($_POST['tableNames']);
                $column = $_POST['columnName'];
                $datatype = $_POST['datatype'];
                $tableNames = $_POST['tableName'];
                foreach ($column as $key => $image) {
                $st = $this->db->prepare("ALTER TABLE $tableNames ADD $image ".$datatype[$key]."");
                $st->execute(); 
                }
                $_SESSION['sucess'] = "Columns Create Sucessfully";

                header('location:/list');
     }

// store the data for insert datas
     public function storeData($data){

      $db = $data["databaseName"];
     parent::__construct($db);
     $tables = $data["tableName"];
       unset($data["databaseName"]);
      unset($data["tableName"]);
  
       $key = array_keys($data);
       $val = array_values($data);
       $sql = "INSERT INTO $tables (" . implode(', ', $key) . ") "
       . "VALUES ('" . implode("', '", $val) . "')";
      $this->db->query($sql);

      header('location:/addRows');
     }

}

