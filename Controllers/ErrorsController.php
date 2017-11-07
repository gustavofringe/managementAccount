<?php
namespace Http;
use App\Controller;
class ErrorsController extends Controller
{
    public function index(){
        $var['title'] = "Errors";
        //$this->Views->set($var);
        $this->Views->render('errors', '404',$var);
        die();
    }
}
