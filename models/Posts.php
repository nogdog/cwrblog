<?php

/**
 * Created by PhpStorm.
 * User: creace
 * Date: 8/28/16
 * Time: 4:16 PM
 */
class Posts
{
    public $posts = array();

    public function __construct()
    {
        $posts = glob('posts/2*.md');
        foreach($posts as $path) {
            $this->posts[] = $this->stripSuffix($path);
        }
    }

    public function getPrevious($postName)
    {
        $ix = array_search('posts/'.$this->stripSuffix($postName), $this->posts);
        return ($ix > 0) ? $this->parts(basename($this->posts[$ix - 1])) : false;
    }

    public function getNext($postName)
    {
        $ix = array_search('posts/'.$this->stripSuffix($postName), $this->posts);
        return ($ix !== false and $ix < (count($this->posts) - 1))
            ? $this->parts(basename($this->posts[$ix + 1]))
            : false;
    }

    public function getLatest()
    {
        return count($this->posts) ? $this->parts(basename($this->posts[count($this->posts) - 1])) : false;
    }

    private function stripSuffix($path)
    {
        return preg_replace('/\.md$/i', '', $path);
    }

    public function parts($path)
    {
        $parts = explode('_', $path);
        $result = array(
            'path' => preg_replace('/\.md$/', '', $path),
            'date' => array_shift($parts),
            'title' => ucwords(implode(' ', $parts))
        );
        return $result;
    }
}