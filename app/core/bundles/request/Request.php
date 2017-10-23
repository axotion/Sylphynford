<?php 

namespace app\core\bundles\request;

class Request{

    protected $get;
    protected $post;
    protected $cookies;
    protected $session;

    public function __construct($get = null, $post = null, $cookies = null, $session = null)
    {
        $this->get = $get;
        $this->post = $post;
        $this->cookies = $cookies;
        $this->session = $session;
    }

    public function query()
    {
        return $this->get;
    }

    public function request()
    {
        return $this->post;
    }
    
    public function cookies()
    {
        return $this->cookies;
    }

    public function session()
    {
        return $this->session();
    }

}