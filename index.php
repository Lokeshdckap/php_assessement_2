<?php


require_once 'router.php';


$router = new Router();

session_start();

$router->get('/','dbView');

$router->post('/dbCreate','create');


$router->get('/list','fetch');

$router->get('/createTable','createTable');

$router->post('/createColumns','createColumns');

$router->get('/tableList','tableList');

$router->get('/columnList','columnList');

$router->get('/addRows','rows');

$router->post('/insertData','store');


$router->routes($_SERVER['REQUEST_URI']);
?>
