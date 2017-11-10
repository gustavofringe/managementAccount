<?php

namespace Http;

use App\Controller;
use Entity\Posts;

class PostsController extends Controller
{
    /**
     *create new account
     */
    public function create()
    {
        //title page
        $title = "Nouveau compte";
        //load model for validate
        $this->loadModel('Post');
        //verify entry
        if ($this->Request->post) {
            if ($this->Post->validates($this->Request->post)) {
                $accounts = new Posts(get_object_vars($this->Request->post));
                //save in database
                $this->Post->save('accounts', [
                    'name' => $accounts->getName(),
                    'balance' => $accounts->getBalance()
                ]);

                //flash message
                $this->Session->setFlash('Votre compte est enregistré');
                //redirection
                $this->Views->redirect(BASE_URL . '/pages/accounts');
                die();
            }
        }
        $this->Views->render('posts', 'create', compact('title'));
    }

    /**
     * add money
     * @param $id
     */
    public function add($id)
    {
        //title page
        $title = "Créditer le compte";
        //load model for validate
        $this->loadModel('Post');
        //find account in term of id
        $account = $this->Post->findFirst('accounts', [
            'conditions' => ['accountID' => $id]
        ]);
        $account = new Posts(get_object_vars($account));
        if ($this->Request->post) {
            //validate entry
            if ($this->Post->validates($this->Request->post)) {
                //define id account for update
                $this->Request->post->accountID = $id;
                //add money
                $this->Request->post->balance = $account->getBalance() + $this->Request->post->balance;
                //update database
                $this->Post->save('accounts', $this->Request->post);
                //flash message & redirect
                $this->Session->setFlash('Votre crédit est enregistré');
                $this->Views->redirect(BASE_URL . '/pages/accounts');
                die();
            }
        }
        $this->Views->render('posts', 'add', compact('title', 'account'));
    }

    public function sub($id)
    {
        $title = "Débiter le compte";
        $this->loadModel('Post');
        $account = $this->Post->findFirst('accounts', [
            'conditions' => ['accountID' => $id]
        ]);
        $account = new Posts(get_object_vars($account));
        if ($account->getBalance() >= -500) {
            if ($this->Request->post) {
                //validate entry
                if ($this->Post->validates($this->Request->post)) {
                    //define id account for update
                    $this->Request->post->accountID = $id;
                    //add money
                    $this->Request->post->balance = $account->getBalance() - $this->Request->post->balance;
                    //update database
                    $this->Post->save('accounts', $this->Request->post);
                    //flash message & redirect
                    $this->Session->setFlash('Votre débit est enregistré');
                    $this->Views->redirect(BASE_URL . '/pages/accounts');
                    die();
                }
            }
        } else {
            $this->Session->setFlash('Vous avez dépasser le seuil de votre découvert autorisé', 'danger');
            $this->Views->redirect(BASE_URL . '/pages/accounts');
            die();
        }
        $this->Views->render('posts', 'sub', compact('title', 'account'));
    }

    public function transfer()
    {
        //title page
        $title = "Virement";
        //load model
        $this->loadModel('Post');
        //find all accounts
        $accounts = $this->Post->findAll('accounts',[]);
        foreach($accounts as $k=>$v){
            $accounts[$k] = new Posts(get_object_vars($v));
        }
        if($this->Request->post){
            //verify idem account
            if($this->Request->post->debiter != $this->Request->post->credited){
                //find account for operations
                $debiter = $this->Post->findFirst('accounts', [
                    'conditions' => ['accountID' => $this->Request->post->debiter]
                ]);
                $debiter = new Posts(get_object_vars($debiter));
                $credited = $this->Post->findFirst('accounts', [
                    'conditions' => ['accountID' => $this->Request->post->credited]
                ]);
                $credited = new Posts(get_object_vars($credited));
                //operation
                $credit = $debiter->getBalance() - $this->Request->post->balance;
                $debit = $credited->getBalance() + $this->Request->post->balance;
                //define accountID & balance
                $this->Request->post->accountID = $this->Request->post->debiter;
                $this->Request->post->balance = $debit;
                //save in database
                $test = $this->Post->save('accounts',$this->Request->post);
                //define accountID & balance
                $this->Request->post->accountID = $this->Request->post->credited;
                $this->Request->post->balance = $credit;
                //save in database
                $test = $this->Post->save('accounts',$this->Request->post);
                //message flash & redirect
                $this->Session->setFlash('Le virement a été correctement effectué');
                $this->Views->redirect(BASE_URL.'/pages/accounts');
                die();
            }else{
                $this->Session->setFlash("Vous ne pouvez pas faire de virements sur le même compte","danger");
            }
        }
        $this->Views->render('posts', 'transfer', compact('title','accounts'));
    }

    public function delete($id)
    {
        $this->loadModel('Post');
        //find the current accounts
        $account = $this->Post->findFirst('accounts', [
            'conditions' => ['accountID' => $id]
        ]);
        $account = new Posts(get_object_vars($account));
        //condition for delete
        if ($account->getBalance() > 0) {
            //delete
            $this->Post->delete('accounts', $id);
            //message & redirect
            $this->Session->setFlash('Compte supprimer', 'danger');
            $this->Views->redirect(BASE_URL . '/pages/accounts');
            die();
        } else {
            $this->Session->setFlash('Le solde de votre compte est négatif', 'danger');
            $this->Views->redirect(BASE_URL . '/pages/accounts');
            die();
        }
    }
}