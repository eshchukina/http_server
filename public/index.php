<?php

function autoload_src($class_name) {
    require '../src/' . implode('/', explode('\\', $class_name)) . '.php';
}
spl_autoload_register('autoload_src');


$router = new Http\Router();
$router->register('GET', '/', 'app_info');
$router->register('POST', '/tasks', 'create_task');
$router->register('GET', '/tasks', 'get_task_list');
//$router->register('GET', '/tasks/:id', 'get_task');
//$router->register('PUT', '/tasks/:id', 'update_task');
//$router->register('DELETE', '/tasks/:id', 'delete_task');

$router->exec();

function app_info(Http\Request $request, Http\Response $response) {
    $response->setStatus(200);
    $response->setBody([
        'fn_mane' => 'app_info',
        'status' => 'OK',
    ]);
}

function get_task_list(Http\Request $request, Http\Response $response)
{
    $response->setStatus(200);
    $response->setBody([
        'fn_mane' => 'get_task_list',
        'status' => 'OK',
    ]);
}

function get_task(Http\Request $request, Http\Response $response)
{
    $response->setStatus(200);
    $response->setBody([
        'data' => 'get_task',
        'status' => 'OK',
    ]);


}

function create_task(Http\Request $request, Http\Response $response)
{
    $response->setStatus(201);
    $response->setBody([
        'fn_mane' => 'create_task',
        'status' => 'OK',
        'response' => $request->getBody(),
    ]);
}
