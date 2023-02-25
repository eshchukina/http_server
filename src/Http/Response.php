<?php
namespace Http;

class Response {
    private $status;
    private $body;
    private $headers;

    public function __construct()
    {
        $this->headers = [];
        $this->addHeader('X-Router', 'Http\Router');
    }

    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }


    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }



}