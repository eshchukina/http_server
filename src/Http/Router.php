<?php

namespace Http;

class Router {
    private $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    public function register($method, $url, $handlers)
    {
        $this->routes[$method][$url] = $handlers;
    }

    public function exec()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $request = new Request($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI'], $data, []);

        $response = new Response();

        $handler = $this->getHandler($request);

        call_user_func($handler, $request, $response);


        $this->respond($response);

    }

    private function getHandler(Request $request)
    {
        if (!empty($this->routes[$request->getMethod()][$request->getUrl()])) {
            return $this->routes[$request->getMethod()][$request->getUrl()];
        }

        return [$this, 'notFoundHandler'];
    }

    private function notFoundHandler(Request $request, Response $response)
    {
        $response->setStatus(404);
        $response->setBody([
            'error' => 'not found',
        ]);
    }

    public function respond(Response $response)
    {
        foreach ($response->getHeaders() as $key => $value) {
            header($key . ': ' . $value);
        }

        http_response_code($response->getStatus());
        echo json_encode($response->getBody());
    }

}
