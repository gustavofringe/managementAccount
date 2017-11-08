<h2 class="mt-5 text-center">Créer un nouveau compte</h2>
<?php
App\Form::open();
App\Form::input('account','Choisissez votre compte',['select'=>'form-control','classDiv'=>'form-group','class'=>'','options'=>[
    'livreta'=>'Livret A',
    'ldd'=>'Livret développement durable',
    'lj'=>'Livret jeune',
    'lep'=>'Livret d\'épargne populaire'
    ]]);
App\Form::input('balance','Montant verser',['classDiv'=>'form-group','class'=>'form-control']);
App\Form::button(['type'=>'submit','class'=>'btn btn-primary','name'=>'Créer']);
App\Form::close();
?>
