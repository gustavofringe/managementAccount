<?php
namespace Http;
use App\Controller;

class PostsController extends Controller{
    /**
     *create new account
     */
    public function create(){
        //title page
        $title = "Nouveau compte";
        //load model for validate
        $this->loadModel('Post');
        //verify entry
        if($this->Request->post){
            if($this->Post->validates($this->Request->post)){
                //save in database
                $this->Post->save('accounts',$this->Request->post);
                //flash message
                $this->Session->setFlash('Votre compte est enregistré');
                //redirection
                $this->Views->redirect(BASE_URL.'/pages/accounts');
                die();
            }
        }
        $this->Views->render('posts','create',compact('title'));
    }

    /**
     * add money
     * @param $id
     */
    public function add($id){
        //title page
        $title = "Créditer le compte";
        //load model for validate
        $this->loadModel('Post');
        //find account in term of id
        $account = $this->Post->findFirst('accounts',[
            'conditions'=>['accountID'=>$id]
        ]);
        if($this->Request->post){
            //validate entry
            if($this->Post->validates($this->Request->post)){
                //define id account for update
                $this->Request->post->accountID = $id;
                //add money
                $this->Request->post->balance = $account->balance + $this->Request->post->balance;
                //update database
                $this->Post->save('accounts',$this->Request->post);
                //flash message & redirect
                $this->Session->setFlash('Votre crédit est enregistré');
                $this->Views->redirect(BASE_URL.'/pages/accounts');
                die();
            }
        }
        $this->Views->render('posts','add',compact('title','account'));
    }
    public function sub($id){
        $title = "Débiter le compte";
        $this->loadModel('Post');
        $account = $this->Post->findFirst('accounts',[
            'conditions'=>['accountID'=>$id]
        ]);
        if($account->balance >= -500) {
            if ($this->Request->post) {
                //validate entry
                if ($this->Post->validates($this->Request->post)) {
                    //define id account for update
                    $this->Request->post->accountID = $id;
                    //add money
                    $this->Request->post->balance = $account->balance - $this->Request->post->balance;
                    //update database
                    $this->Post->save('accounts', $this->Request->post);
                    //flash message & redirect
                    $this->Session->setFlash('Votre crédit est enregistré');
                    $this->Views->redirect(BASE_URL . '/pages/accounts');
                    die();
                }
            }
        }else{
            $this->Session->setFlash('Crédits insufisants','danger');
            $this->Views->redirect(BASE_URL . '/pages/accounts');
            die();
        }
        $this->Views->render('posts','sub',compact('title','account'));
    }
}