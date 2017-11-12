<h2 class="mt-5">Accéder a vos comptes</h2>
<!--button to access-->
<?php
App\Form::open('mt-5');
App\Form::input('name','Votre nom',['classDiv'=>'form-group','class'=>'form-control'],'Votre nom');
App\Form::input('password','Mot de passe',['type'=>'password','classDiv'=>'form-group mt-5','class'=>'form-control'],'Mot de passe');
App\Form::button(['type'=>'submit','class'=>'btn btn-primary mt-5','name'=>'Se connecter']);
App\Form::close();