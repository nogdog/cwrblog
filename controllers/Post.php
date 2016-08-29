<?php

/**
 * Created by PhpStorm.
 * User: creace
 * Date: 8/28/16
 * Time: 10:17 PM
 */

require_once __DIR__.'/Controller.php';

class Post extends Controller
{
    protected $posts;
    
    public function __construct()
    {
        parent::__construct();
        require_once __DIR__.'/../models/Posts.php';
        $this->posts = new Posts();
    }

    public function index()
    {
        $path = strtolower(str_replace('.', '', $this->url['path']));
        $this->data['current']['path'] = ltrim($path, '/');
        $this->data['previous'] = $this->posts->getPrevious($this->data['current']['path']);
        $this->data['next']     = $this->posts->getNext($this->data['current']['path']);
    }
    
    public function latest()
    {
        $this->data['current']  = $this->posts->getLatest();
        $this->data['previous'] = $this->posts->getPrevious($this->data['current']['path']);
        $this->data['next']     = $this->posts->getNext($this->data['current']['path']);
    }
}