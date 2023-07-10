<?php


require_once 'router.php';


$router = new Router();

session_start();

$router->get('/','dbView');

$router->post('/dbCreate','create');

// $router->post('/store','create');

// $router->post('/edit','edit');

$router->get('/list','fetch');

$router->get('/createTable','createTable');
$router->post('/createColumns','createColumns');

$router->get('/tableList','tableList');

// createColumns


// $router->put('/update','update');

// $router->delete('/delete','delete');

$router->routes($_SERVER['REQUEST_URI']);
?>
