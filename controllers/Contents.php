<?php
/**
 * CWRBlog
 */

require_once __DIR__.'/Controller.php';

/**
 * Contents page
 */
class Contents extends Controller
{
    /**
     * @var Posts
     */
    private $posts;

    /**
     * Contents constructor.
     */
    public function __construct()
    {
        parent::__construct();
        require_once __DIR__.'/../models/Posts.php';
        $this->posts = new Posts();
    }

    /**
     * getter for posts property
     * @return Posts
     */
    public function posts()
    {
        return $this->posts;
    }

    /**
     * default entry point
     * @return array
     */
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
        krsort($result);
        return $result;
    }
}
