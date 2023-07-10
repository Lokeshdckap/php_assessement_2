<?php


class DB
{
    public $db;


    public function __construct($dd)

   
    {
        // var_dump($dd);
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


class database extends DB{
    
    private $database;

    public function __construct(){
        $this->database = $_POST['databaseName'];
        parent::__construct($this->database);

    }

    public function create($data) {
    
        $sql = "CREATE DATABASE $data";  
        $ins = $this->db->prepare($sql);
        $ins->execute();

        header('location:/dbView');
    }

    public function read(){
        $result = "SHOW DATABASES"; 
        $row =  $this->db->prepare($result);
        $row->execute();
        $details = $row->fetchAll();
        return $details;
     }

     public function createTable(){
        $this->database = $_POST['databaseName'];
        $tablename = $_POST['tableName'];
        
        $sql = "CREATE TABLE $tablename(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
        $row =  $this->db->prepare($sql);
        $row->execute();
        header('location:/');
     }

     public function tableList(){


        $result = "SHOW TABLES FROM "; 
        $row =  $this->db->prepare($result);
        $row->execute();
        $details = $row->fetchAll();

        // $allDatas = [];
    
        //  foreach($details as $detail){
        //     $allDatas[]= $detail['Tables_in_'.$data];
        //  }
        echo  json_encode($details);
        
     }

}

// echo json_encode('jequhheefiej');



