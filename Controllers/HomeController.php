<?php
namespace Http;
use App\Controller;
class HomeController extends Controller
{

    /**
     *
     */
    public function index(){
        $title = "Accueil";
        if($this->Request->post){
            $this->Views->redirect('pages','account');
            die();
        }
        $this->Views->render('pages', 'index',compact('title'));
    }
}
