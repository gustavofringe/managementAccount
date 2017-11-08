<?php
namespace Http;
use App\Controller;

class PagesController extends Controller{
    public function accounts(){
        $title = "Mes comptes";
        $this->Views->render('pages','accounts',compact('title'));
    }
}
