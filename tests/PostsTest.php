<?php

use PHPUnit\Framework\TestCase;
require_once 'models/Posts.php';

class PostsTest extends TestCase
{
    private $posts = array(
        'first' => array(
            'file'    => 'posts/1991-01-01_first_post.md',
            'content' => '# First Post',
            'name'    => 'posts/1991-01-01_first_post'
        ),
        'second' => array(
            'file'    => 'posts/1991-01-02_second_post.md',
            'content' => '# Second Post',
            'name'    => 'posts/1991-01-02_second_post'
        ),
        'last' => array(
            'file'    => 'posts/2033-01-01_last_post.md',
            'content' => '# Last Post',
            'name'    => 'posts/2033-01-01_last_post'
        ),

    );

    public function setUp()
    {
        foreach($this->posts as $key => $data) {
            file_put_contents($data['file'], $data['content']);
        }
    }

    public function tearDown()
    {
        foreach($this->posts as $data) {
            unlink($data['file']);
        }
    }

    public function testGetLatest()
    {
        $posts = new Posts();
        $latest = $posts->getLatest();
        $this->assertTrue(is_array($latest));
        $this->assertEquals('2033-01-01', $latest['date']);
        $this->assertEquals('Last Post', $latest['title']);
    }

    public function testGetNext()
    {
        $posts = new Posts();
        $nextPost = $posts->getNext($this->posts['first']['name']);
        $this->assertEquals(basename($this->posts['second']['name']), $nextPost['path']);
    }

    public function testGetPrevious()
    {
        $posts = new Posts();
        $previousPost = $posts->getPrevious($this->posts['second']['name']);
        $this->assertEquals(basename($this->posts['first']['name']), $previousPost['path']);
    }
}