<?php

namespace Http;

use App\Controller;
use function dd;
use Entity\Posts;

class PostsController extends Controller
{
    /**
     *create new account
     */
    public function create()
    {

        $this->Session->isLogged('user');
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
                    'balance' => $accounts->getBalance(),
                    'debiter' => 0,
                    'credited' => 0,
                    'userID' => $this->Request->session->user->userID
                ]);
                //change session getAccount for display page without error
                $this->Session->write('getAccount', true);
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

    /**
     * @param $id
     */
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
            $this->Session->setFlash('Vous avez dépasser le seuil de votre découvert autorisé de 500€', 'danger');
            $this->Views->redirect(BASE_URL . '/pages/accounts');
            die();
        }
        $this->Views->render('posts', 'sub', compact('title', 'account'));
    }

    /**
     *
     */
    public function transfer()
    {
        //title page
        $title = "Virement";
        //load model
        $this->loadModel('Post');
        //find all accounts
        $accounts = $this->Post->findAll('accounts', []);
        foreach ($accounts as $k => $v) {
            $accounts[$k] = new Posts(get_object_vars($v));
        }
        if ($this->Request->post) {
            //verify idem account
            if ($this->Request->post->debiter != $this->Request->post->credited) {
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
                $debit = $debiter->getBalance() - $this->Request->post->balance;
                $credit = $credited->getBalance() + $this->Request->post->balance;
                //define accountID & balance
                $this->Request->post->accountID = $this->Request->post->debiter;
                $this->Request->post->balance = $debit;
                //save in database
                $this->Post->save('accounts', $this->Request->post);
                //define accountID & balance
                $this->Request->post->accountID = $this->Request->post->credited;
                $this->Request->post->balance = $credit;
                //save in database
                $this->Post->save('accounts', $this->Request->post);
                //message flash & redirect
                $this->Session->setFlash('Le virement a été correctement effectué');
                $this->Views->redirect(BASE_URL . '/pages/accounts');
                die();
            } else {
                $this->Session->setFlash("Vous ne pouvez pas faire de virements sur le même compte", "danger");
            }
        }
        $this->Views->render('posts', 'transfer', compact('title', 'accounts'));
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        dd($_POST);
        $this->Session->isLogged('user');
        $this->loadModel('Post');
        dd($this->Request->post);
        $this->Post->delete('accounts', $id);
        $this->Session->setFlash('Compte supprimer', 'danger');
        $this->Views->redirect(BASE_URL . '/pages/accounts');
    }
}
