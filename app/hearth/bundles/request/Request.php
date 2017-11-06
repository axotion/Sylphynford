<?php 

namespace app\hearth\bundles\request;

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

    public function query($var = null)
    {
        return $var ? $this->get[$var] : $this->get;
    }

    public function request($var = null)
    {
        return $var ? $this->post[$var] : $this->post;
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