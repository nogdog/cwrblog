<?php

use PHPUnit\Framework\TestCase;
require_once 'controllers/Contents.php';

class ContentsTest extends TestCase
{
    private $posts = array(
        'first' => array(
            'file'    => 'posts/1993-01-01_first_post.md',
            'content' => '# First Post',
            'name'    => 'posts/1993-01-01_first_post'
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

    public function testIndex()
    {
        $_SERVER['REQUEST_URI'] = '/contents';
        $home = new Contents();
        $data = $home->index();
        $this->assertTrue(is_array($data));
        $this->assertEquals('First Post', $data[0]['title']);
        $this->assertEquals('Last Post', $data[count($data) - 1]['title']);
    }
}