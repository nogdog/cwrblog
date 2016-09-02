<?php
/**
 * Created by PhpStorm.
 * User: creace
 * Date: 8/28/16
 * Time: 9:53 PM
 */

/**
 * Class Controller
 */
abstract class Controller
{
    /**
     * @var array URL parts
     */
    protected $url = array();

    /**
     * @var array Stuff the view might need
     */
    protected $data = array();

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->url = parse_url($_SERVER['REQUEST_URI']);
    }

    /**
     * main/default entry point
     * @return mixed
     */
    abstract public function index();

    /**
     * getter for data property
     * @return array
     */
    public function data()
    {
        return $this->data;
    }
}