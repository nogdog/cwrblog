<?php

/**
 * Created by PhpStorm.
 * User: creace
 * Date: 8/28/16
 * Time: 4:16 PM
 */
class Posts
{
    /**
     * @var array array of file info from /posts directory
     */
    public $posts = array();

    /**
     * Posts constructor.
     */
    public function __construct()
    {
        $posts = glob('posts/2*.md');
        foreach($posts as $path) {
            $this->posts[] = $this->stripSuffix($path);
        }
    }

    /**
     * Get the previous post (by date)
     * @param $postName
     * @return array|bool
     */
    public function getPrevious($postName)
    {
        $postName = basename($postName);
        $ix = array_search('posts/'.$this->stripSuffix($postName), $this->posts);
        return ($ix > 0) ? $this->parts(basename($this->posts[$ix - 1])) : false;
    }

    /**
     * Get the next post (by date)
     * @param $postName
     * @return array|bool
     */
    public function getNext($postName)
    {
        $postName = basename($postName);
        $ix = array_search('posts/'.$this->stripSuffix($postName), $this->posts);
        return ($ix !== false and $ix < (count($this->posts) - 1))
            ? $this->parts(basename($this->posts[$ix + 1]))
            : false;
    }

    /**
     * Get the latest post (by date)
     * @return array|bool
     */
    public function getLatest()
    {
        return count($this->posts) ? $this->parts(basename($this->posts[count($this->posts) - 1])) : false;
    }

    /**
     * Strip the ".md" suffix off a path
     * @param $path
     * @return mixed
     */
    private function stripSuffix($path)
    {
        return preg_replace('/\.md$/i', '', $path);
    }

    /**
     * parse a file path into the parts of interest to us
     * @param $path
     * @return array
     */
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