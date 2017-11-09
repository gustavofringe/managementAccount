<?php
namespace Http;
use App\Controller;
use Entity\Pages;
class PagesController extends Controller{


    public function accounts(){
        //define title
        $title = "Mes comptes";
        //load model post for recover entry
        $this->loadModel('Post');
        //search all accounts
        $accounts = $this->Post->findAll('accounts',[]);
        foreach($accounts as $k=>$v){
            $accounts[$k] = new Pages(get_object_vars($v));
            //define color for negatif values
            if($v->balance<0){
                $color = 'red';
            }/*else{
                $color = 'black';
            }*/
        }

        $this->Views->render('pages','accounts',compact('title','accounts','color'));
    }
}
