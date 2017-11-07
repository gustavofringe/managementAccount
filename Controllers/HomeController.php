<?php
namespace Http;
use App\Controller;
class HomeController extends Controller
{

    public function index(){
        $title = "Accueil";
        $this->Views->render('pages', 'index',compact('title'));
    }
}
