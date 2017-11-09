<?php
namespace Http;
use App\Controller;
class PagesController extends Controller{


    public function accounts(){

        $title = "Mes comptes";
        $this->loadModel('Post');
        
        $accounts = $this->Post->findAll('accounts',[]);
        $this->Views->render('pages','accounts',compact('title','accounts'));
    }
}
