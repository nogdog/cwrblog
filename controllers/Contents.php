<?php

/**
 * Created by PhpStorm.
 * User: creace
 * Date: 8/29/16
 * Time: 6:49 PM
 */

require_once __DIR__.'/Controller.php';

class Contents extends Controller
{
    private $posts;

    public function __construct()
    {
        parent::__construct();
        require_once __DIR__.'/../models/Posts.php';
        $this->posts = new Posts();
    }

    public function posts()
    {
        return $this->posts;
    }

    public function index()
    {
        $result = array();
        foreach($this->posts->posts as $post) {
            $parts = explode('_', $post);
            $result[] = array(
                'file' => basename($post),
                'date' => basename($parts[0]),
                'title' => ucwords(implode(' ', array_slice($parts, 1)))
            );
        }
        return $result;
    }

    private function lastTime()
    {
        $cmd = 'ls -At '.__DIR__.'/../posts | head -n 1';
        $latest = trim(shell_exec($cmd));
        return filemtime(__DIR__.'/../posts/'.$latest);
    }
}