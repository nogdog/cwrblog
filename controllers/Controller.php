<?php

/**
 * Created by PhpStorm.
 * User: creace
 * Date: 8/28/16
 * Time: 9:53 PM
 */
abstract class Controller
{
    protected $url = array();
    
    protected $data = array();
    
    public function __construct()
    {
        $this->url = parse_url($_SERVER['REQUEST_URI']);
    }

    public function data()
    {
        return $this->data;
    }

    abstract public function index();
}