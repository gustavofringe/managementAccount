<?php

namespace Http;

use App\Controller;
use function dd;
use Entity\Pages;
use function print_r;

class PagesController extends Controller
{

    /**
     * accounts
     * @return mixed
     */
    public function accounts()
    {
        //dd($this->Request->post);
        $this->Session->isLogged('user');
        //define title
        $var['title'] = "Mes comptes";
        //load model post for recover entry
        $this->loadModel('Post');
        //search all accounts
        $var['accounts'] = $this->Post->findAll('accounts', [
            'conditions' => 'userID=' . $this->Request->session->user->userID
        ]);
        foreach ($var['accounts'] as $k => $v) {
            $var['accounts'][$k] = new Pages(get_object_vars($v));
        }
        //define session getAccount for display no error
        $var['count'] = count($var['accounts']);
        if ($var['count'] === 0) {
            $this->Session->write('getAccount', false);
        }

        if ($this->Request->post) {
            //find account to credit
            $credit = $this->Post->findFirst('accounts', [
                'conditions' => ['accountID' => $this->Request->post->credited]
            ]);
            $credit = new Pages(get_object_vars($credit));
            //find account to debit
            $debit = $this->Post->findFirst('accounts', [
                'conditions' => ['accountID' => $this->Request->post->accountID]
            ]);
            $debit = new Pages(get_object_vars($debit));
            //
            $this->Request->post->balance = $credit->getBalance() + $debit->getBalance();
            $this->Request->post->accountID = $credit->getAccountID();
            if ($debit->getBalance() > 0) {
                //dd($this->Request->post);
                //update account
                $this->Post->save('accounts', $this->Request->post);
                //delete account
                $this->Post->delete('accounts', $debit->getAccountID());
                //redirect & message flash
                $this->Session->setFlash('Compte supprimer', 'danger');
                $this->Views->redirect(BASE_URL . '/pages/accounts');
                die();
            } else {
                $this->Session->setFlash('Le solde de votre compte est négatif', 'danger');
                $this->Views->redirect(BASE_URL . '/pages/accounts');
                die();
            }
        }
        $this->Views->render('pages', 'accounts', $var);
    }

    /**
     * modal
     * @param mixed $id
     * @return mixed
     */
    public function modal($id)
    {
        $this->loadModel('Post');
        //find account with id
        $account = $this->Post->findFirst('accounts', [
            'conditions' => 'accountID=' . $id
        ]);
        $account = new Pages(get_object_vars($account));
        $accounts = $this->Post->findAll('accounts', []);
        foreach ($accounts as $k => $v) {
            $accounts[$k] = new Pages(get_object_vars($v));
        }

        $this->Views->layout = "modal";
        $this->Views->render('pages', 'modal', compact('account', 'accounts'));
    }

    /**
     * logout
     * @return mixed
     */
    public function logout()
    {
        $this->Session->logout('user');
    }
}
