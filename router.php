<?php
require 'controllers/dbController.php';
class Router
{

    public $route = [];
    
    public $controller;
                                                                                                                                                                                                                                     
   public function __construct() {

        $this->controller = new dbController();

    }
    public function get($uri,$action){
        $this->route[]=[
            'uri' => $uri,
            'action' => $action,
            'method' => 'GET'
            
        ];
    }

    public function post($uri,$action){
        $this->route[]=[
            'uri' => $uri,
            'action' => $action,
            'method' => 'POST'
            
        ];
    }


    public function put($uri,$action){
        $this->route[]=[
            'uri' => $uri,
            'action' => $action,
            'method' => 'POST'
            
        ];
    }



    public function delete($uri,$action){
        $this->route[]=[
            'uri' => $uri,
            'action' => $action,
            'method' => 'POST'
            
        ];
    }

    public function routes($uri){
        foreach($this->route as $routers){
            if($routers['uri']==$uri){
                $action = $routers['action'];
                switch ($action) {
                    case 'dbView':
                        $this->controller->index();
                        break;
                    case 'create':
                        $this->controller->create();
                        break;
                     case 'fetch':
                        $this->controller->read();
                        break;
                    case 'createTable':
                        $this->controller->createTable();
                        break;
                    case 'createColumns':
                        $this->controller->createColumn();
                        break;
                    case 'tableList':
                        $this->controller->tableListUsingAjax();
                        break;
                }
            }
        }
    }
}