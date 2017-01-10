<?php

use PHPUnit\Framework\TestCase;
require_once 'controllers/Home.php';

class HomeTest extends TestCase
{
    private $createdHomePage = false;

    private $lastPost = array(
        'file'    => 'posts/2033-01-01_last_post.md',
        'content' => '# Last Post',
        'name'    => 'posts/2033-01-01_last_post'
    );

    public function setUp()
    {
        if(!file_exists('posts/home.md')) {
            file_put_contents('posts/home.md', "# Home Page\n");
            $this->createdHomePage = true;
        }
        file_put_contents($this->lastPost['file'], $this->lastPost['content']);
    }

    public function tearDown()
    {
        if($this->createdHomePage) {
            unlink('posts/home.md');
        }
        unlink($this->lastPost['file']);
    }

    public function testIndexHome()
    {
        $_SERVER['REQUEST_URI'] = '/home';
        $home = new Home();
        $home->index();
        $data = $home->data();
        $this->assertEquals('Last Post', $data['latest']['title']);
        $this->assertEquals('2033-01-01', $data['latest']['date']);
    }

    public function testIndexSlash()
    {
        $_SERVER['REQUEST_URI'] = '/';
        $home = new Home();
        $home->index();
        $data = $home->data();
        $this->assertEquals('Last Post', $data['latest']['title']);
        $this->assertEquals('2033-01-01', $data['latest']['date']);
    }
}