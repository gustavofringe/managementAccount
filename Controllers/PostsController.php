<?php
namespace Http;
use App\Controller;

class PostsController extends Controller{
    public function create(){
        $title = "Nouveau compte";
        if($this->Request->post){
        dd($this->Request->post);
        }
        $this->Views->render('posts','create',compact('title'));
    }
}