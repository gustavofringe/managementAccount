<?php

namespace App;

use Http;
use function ucfirst;

class Route
{
    private $url = false;
    private $controller;
    public $views;

    /**
     * Route constructor.
     */
    public function __construct()
    {
        $this->getUrl();
        if (empty($this->url[0])) {
            $this->loadControllerDefault();
        } elseif (!empty($this->url[0])) {
            $this->loadController();
            $this->methodExist();
        } else {
            $this->errors();
            die();
        }
    }


    /**
     *cut the url
     */
    private function getUrl()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, "/");
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->url = explode("/", $url);
    }

    /**
     *load HomeController by default
     */
    private function loadControllerDefault()
    {
        require_once ROOT . DS . 'Controllers' . DS . 'HomeController.php';
        $this->controller = new Http\HomeController();
        $this->controller->index();
    }

    /**
     *load controller with url
     */
    private function loadController()
    {
        $page = ROOT . DS . 'Controllers' . DS . ucfirst($this->url[0]) . 'Controller.php';
        if (file_exists($page)) {
            require $page;
        } else {
            $this->errors();
            die();
        }
    }

    /**
     *
     */
    private function methodExist()
    {
        //create controller object
        $class = "Http\\" . ucfirst($this->url[0]) . 'Controller';
        $this->controller = new $class;
        //count elements of url separate by /
        $length = count($this->url);
        //if no method exist for url 1 return error
        if ($length > 1) {
            if (!method_exists($this->controller, $this->url[1])) {
                $this->errors();
                die();
            }
        }
        switch ($length) {
            case 5:
                //$controller->method(param1, param2,param3)
                $this->controller->{$this->url[1]}($this->url[2], $this->url[3], $this->url[4]);
                break;
            case 4:
                //$controller->method(param1, param2)
                $this->controller->{$this->url[1]}($this->url[2], $this->url[3]);
                break;
            case 3:
                //$controller->method(param1)
                $this->controller->{$this->url[1]}($this->url[2]);
                break;
            case 2:
                //$controller->method()
                $this->controller->{$this->url[1]}();
                break;
            case 1:
                //$controller default method index
                $this->controller->index();
                break;
            default:
                $this->errors();
                break;
        }
    }


    /**
     *load errors controller
     */
    private function errors()
    {
        require ROOT . '/Controllers/ErrorsController.php';
        $this->controller = new Http\ErrorsController();
        $this->controller->index();
        die();
    }
}
