<h2 class="mt-4">Débiter votre compte</h2>
    <table class="table mt-5">

        <thead>
        <tr>
            <th scope="col">Compte(s)</th>
            <th scope="col">Solde</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="col"><?php echo $account->getName();?></th>
            <th scope="col"><?php echo $account->getBalance();?></th>
        </tr>
        </tbody>
    </table>

<?php
App\Form::open('mt-4');
App\Form::input('balance','Montant à débiter',['classDiv'=>'form-group','class'=>'form-control']);
App\Form::button(['type'=>'submit','class'=>'btn btn-primary mb-5','name'=>'Débiter']);
App\Form::close();