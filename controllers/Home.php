<?php

/**
 * Created by PhpStorm.
 * User: creace
 * Date: 8/28/16
 * Time: 9:57 PM
 */

require_once __DIR__.'/Controller.php';

class Home extends Controller
{
    private $posts;
    
    public function __construct()
    {
        parent::__construct();
        require_once __DIR__.'/../models/Posts.php';
        $this->posts = new Posts();
    }

    public function index()
    {
        $this->data['latest'] = $this->posts->getLatest();
    }
}