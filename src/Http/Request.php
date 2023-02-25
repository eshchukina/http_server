<?php
namespace Http;

class Request {
    private $method;
    private $url;
    private $headers;
    private $body;

    public function __construct($method, $url, $body, $headers)
    {
        $this->method = $method;
        $this->url = $url;
        $this->body = $body;
        $this->headers = $headers;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }
}
