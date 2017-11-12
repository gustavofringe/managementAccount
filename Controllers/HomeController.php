<?php
namespace Http;
use App\Controller;
class HomeController extends Controller
{

    /**
     *
     */
    public function index(){
        $title = "Accueil";
        $this->loadModel('User');
        if($this->Request->post){
            $password = $this->Service->hashPass($this->Request->post->password);
            $users = $this->User->findAll('users', [
                'name' => $this->Request->post->name,
                'password' => $password
            ]);
            foreach($users as $user) {
                if ($password == $user->password) {
                    $this->Session->write('user', $user);
                    $this->Session->write('getAccount', true);
                    $this->Session->setFlash("Vous êtes maintenant connecté");
                    $this->Views->redirect('pages/accounts');
                    die();
                } else {
                    $this->Session->setFlash("Identifiant ou mot de passe incorrect", 'danger');
                }
            }
        }
        $this->Views->render('pages', 'index',compact('title'));
    }
}
