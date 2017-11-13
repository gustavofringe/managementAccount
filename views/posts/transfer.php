<h2 class="text-center mt-3">Virements</h2>
<?php
App\Form::open('mt-4');
?>
<div class="form-group">
    <label for="exampleFormControlSelect1">Compte a débiter</label>
    <select class="form-control" id="exampleFormControlSelect1" name="debiter">
    <?php foreach($accounts as $account):?>
      <option value="<?php echo $account->getAccountID();?>"><?php echo $account->getName();?> (<?php echo $account->getBalance();?> €)</option>
<?php endforeach;?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Compte a créditer</label>
    <select class="form-control" id="exampleFormControlSelect2" name="credited">
    <?php foreach($accounts as $account):?>
      <option value="<?php echo $account->getAccountID();?>"><?php echo $account->getName();?> (<?php echo $account->getBalance();?> €)</option>
<?php endforeach;?>
    </select>
  </div>
<?php
App\Form::input('balance', 'Montant à débiter', ['classDiv' => 'form-group', 'class' => 'form-control'],'Montant');
App\Form::button(['type' => 'submit', 'class' => 'btn btn-primary mb-5', 'name' => 'Débiter']);
App\Form::close();