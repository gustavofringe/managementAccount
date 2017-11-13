<h2 class="mt-5 text-center">Créer un nouveau compte</h2>
<div class="row">
    <div class="col-md-6">
        <?php
        App\Form::open();
        App\Form::input('name', 'Choisissez votre compte', ['select' => 'form-control', 'classDiv' => 'form-group', 'class' => '', 'options' => [
            'Livret A' => 'Livret A',
            'Livret développement durable' => 'Livret développement durable',
            'Livret jeune' => 'Livret jeune',
            'Livret d\'épargne populaire' => 'Livret d\'épargne populaire'
        ]]);
        App\Form::input('balance', 'Montant verser', ['classDiv' => 'form-group', 'class' => 'form-control']);
        App\Form::button(['type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'Créer']);
        App\Form::close();
        ?>
    </div>
</div>
