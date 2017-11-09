<h2 class="text-center mt-3">Virement</h2>
<?php
App\Form::open('mt-4');
App\Form::input('name','Compte à débiter',['select'=>'form-control','classDiv'=>'form-group','class'=>'','options'=>[
    'Livret A'=>'Livret A',
    'Livret développement durable'=>'Livret développement durable',
    'Livret jeune'=>'Livret jeune',
    'Livret d\'épargne populaire'=>'Livret d\'épargne populaire'
    ]]);
    App\Form::input('name','Compte à créditer',['select'=>'form-control','classDiv'=>'form-group','class'=>'','options'=>[
        'Livret A'=>'Livret A',
        'Livret développement durable'=>'Livret développement durable',
        'Livret jeune'=>'Livret jeune',
        'Livret d\'épargne populaire'=>'Livret d\'épargne populaire'
        ]]);
App\Form::input('balance','Montant à débiter',['classDiv'=>'form-group','class'=>'form-control']);
App\Form::button(['type'=>'submit','class'=>'btn btn-primary mb-5','name'=>'Débiter']);
App\Form::close();