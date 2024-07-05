<?php

namespace App\Core;

class Request
{
    protected $params;
    protected $method;
    protected $headers;

    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->headers = getallheaders();
    }

    public function getParam($name, $default = null)
    {
        return isset($this->params[$name]) ? $this->params[$name] : $default;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getHeaders()
    {
        return $this->headers;
    }
}
