<h2 class="mt-4">Créditer votre compte</h2>
<!--table for see account selected-->
<table class="table mt-5 mb-5">
    <thead>
    <tr>
        <th scope="col">Compte(s)</th>
        <th scope="col">Solde</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="col"><?php echo $account->getName(); ?></th>
        <th scope="col"><?php echo $account->getBalance(); ?> €</th>
    </tr>
    </tbody>
</table>
<!--form-->
<?php
App\Form::open('mt-4 mb-5');
App\Form::input('balance', 'Montant à créditer', ['classDiv' => 'form-group', 'class' => 'form-control']);
App\Form::button(['type' => 'submit', 'class' => 'btn btn-primary mb-5', 'name' => 'Créditer']);
App\Form::close();