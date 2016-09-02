<?php

/**
 * Created by PhpStorm.
 * User: creace
 * Date: 8/28/16
 * Time: 9:57 PM
 */

require_once __DIR__.'/Controller.php';

/**
 * Class Home
 */
class Home extends Controller
{
    /**
     * @var Posts
     */
    private $posts;

    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        require_once __DIR__.'/../models/Posts.php';
        $this->posts = new Posts();
    }

    /**
     * entry point
     */
    public function index()
    {
        $this->data['latest'] = $this->posts->getLatest();
    }
}