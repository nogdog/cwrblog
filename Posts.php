<?php

/**
 * Created by PhpStorm.
 * User: creace
 * Date: 8/28/16
 * Time: 4:16 PM
 */
class Posts
{
    private $posts = array();

    public function __construct()
    {
        $posts = glob('posts/2*.md');
        foreach($posts as $path) {
            $this->posts[] = $this->stripSuffix($path);
        }
    }

    public function getPrevious($postName)
    {
        $ix = array_search($this->stripSuffix($postName), $this->posts);
        return ($ix > 0) ? $this->parts(basename($this->posts[$ix - 1])) : false;
    }

    public function getNext($postName)
    {
        $ix = array_search($this->stripSuffix($postName), $this->posts);
        return ($ix !== false and $ix < (count($this->posts) - 1))
            ? $this->parts(basename($this->posts[$ix + 1]))
            : false;
    }

    public function getLatest()
    {
        return $this->parts(basename($this->posts[count($this->posts) - 1]));
    }

    private function stripSuffix($path)
    {
        return preg_replace('/\.md$/i', '', $path);
    }

    private function parts($path)
    {
        $parts = explode('_', $path);
        $result = array(
            'path' => $path,
            'date' => array_shift($parts),
            'title' => ucwords(implode(' ', $parts))
        );
        return $result;
    }
}