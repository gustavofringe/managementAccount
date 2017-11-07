<?php
namespace Http;
use App\Controller;
class ErrorsController extends Controller
{
    public function index(){
        $title = "Errors";
        $this->Views->render('errors', '404',compact('title'));
        die();
    }
}
