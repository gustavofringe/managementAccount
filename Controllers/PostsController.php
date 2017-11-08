<?php
namespace Http;
use App\Controller;

class PostsController extends Controller{
    public function create(){
        $title = "Nouveau compte";
        $this->loadModel('Post');
        if($this->Request->post){
            if($this->Post->validates($this->Request->post)){
                $this->Post->save('accounts',$this->Request->post);
                $this->Session->setFlash('Votre compte est enregistré');
                $this->Views->redirect(BASE_URL.'/pages/accounts');
                die();
            }
        }
        $this->Views->render('posts','create',compact('title'));
    }
    public function add($id){
        $title = "Créditer le compte";
        $this->loadModel('Post');
        $account = $this->Post->findFirst('accounts',[
            'conditions'=>['accountID'=>$id]
        ]);
        if($this->Request->post){
            if($this->Post->validates($this->Request->post)){
                $this->Request->post->accountID = $id;
                $this->Request->post->balance = $account->balance + $this->Request->post->balance;
                $post = $this->Post->save('accounts',$this->Request->post);
                $this->Session->setFlash('Votre crédit est enregistré');
                $this->Views->redirect(BASE_URL.'/pages/accounts');
                die();
            }
        }
        $this->Views->render('posts','add',compact('title','account'));
    }
}