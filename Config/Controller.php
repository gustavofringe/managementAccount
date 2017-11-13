<?php
namespace App;
class Controller

{
    public $Session;
    public $Views;
    public $Email;
    public $Form;
    public $Service;
    public $Img;
    public $Request;

    /**
     * load instance
     * Controller constructor.
     */
    public function __construct()
    {
        $this->Session = new Session();
        $this->Views = new View();
        $this->Email = new Email();
        $this->Form = new Form($this);
        $this->Service = new Service();
        $this->Img = new Img();
        $this->Request = new Request();
        
    }
    /**
     * load model for validate form
     * @param $name
     */
    public function loadModel($name){
        if(!isset($this->$name)){
            $file = ROOT.DS.'Model'.DS.$name.'.php';
            require_once($file);
            $this->$name = new $name();
            if(isset($this->Form)){
                $this->$name->Form = $this->Form;
            }
        }
    }

    public function loadEntity($name, $value){
        if(!isset($this->$name)){
            $file = ROOT.DS.'Entities'.DS.$name.'.php';
            require_once($file);
            $this->$name = new $name($value);
        }
    }
}
