<?php

use PHPUnit\Framework\TestCase;
require_once 'controllers/Post.php';

class PostTest extends TestCase
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
        )
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

    public function testIndex1()
    {
        $_SERVER['REQUEST_URI'] = '/'.basename($this->posts['first']['name']);
        $post = new Post();
        $post->index();
        $data = $post->data();
        $this->assertEquals('First Post', $data['title']);
        $this->assertEquals(basename($this->posts['first']['name']), $data['current']['path']);
        $this->assertEquals('Second Post', $data['next']['title']);
    }

    public function testIndex2()
    {
        $_SERVER['REQUEST_URI'] = '/'.basename($this->posts['second']['name']);
        $post = new Post();
        $post->index();
        $data = $post->data();
        $this->assertEquals('Second Post', $data['title']);
        $this->assertEquals(basename($this->posts['second']['name']), $data['current']['path']);
        $this->assertEquals('First Post', $data['previous']['title']);
    }

    public function testLatest()
    {
        $_SERVER['REQUEST_URI'] = '/'.basename($this->posts['second']['name']);
        $post = new Post();
        $post->latest();
        $data = $post->data();
        $this->assertEquals('Last Post', $data['title']);
    }
}