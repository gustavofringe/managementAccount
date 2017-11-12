<?php
namespace App;

use stdClass;

class Request
{
    public $post = false;
    public $file = false;
    public $session = false;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        //recover all posts
        if (!empty($_POST)) {
            $this->post = new stdClass();
            foreach ($_POST as $k => $v) {
                $this->post->$k = $v;
            }
        }
        //recover all files
        if(!empty($_FILES)){
            $this->file = new stdClass();
            foreach($_FILES as $k=>$v){
                $this->file->$k = $v;
            }
        }
        //recover all session
        if(!empty($_SESSION)){
            $this->session = new stdClass();
            foreach($_SESSION as $k=>$v){
                $this->session->$k = $v;
            }
        }
    }
}
