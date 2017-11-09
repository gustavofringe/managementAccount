<h2 class="mt-4 text-center">Vos comptes</h2>
<div class="row mt-5 mb-5">
    <div class="col-md-12">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Compte(s)</th>
      <th scope="col">Solde en euro</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($accounts as $account):?>
    <tr>
      <th scope="row"><?php echo $account->name;?></th>
      <td><input class="error form-control" type="text" value="<?php echo $account->balance;?>" readonly></td>
      <td>
      <div class="btn-group-vertical">
      <a class="btn btn-secondary" href="<?php echo BASE_URL;?>/posts/add/<?php echo $account->accountID;?>">Créditer</a>
      <a class="btn btn-secondary" href="<?php echo BASE_URL;?>/posts/sub/<?php echo $account->accountID;?>">Débiter</a>
      </div>
      <a class="btn btn-danger" href="<?php echo BASE_URL;?>/posts/delete/<?php echo $account->accountID;?>" onclick="return confirm('Voulez vous vraiment le supprimer?');">Supprimer</a>
      </td>
    </tr>
<?php endforeach;?>
  </tbody>
</table>
    </div>
</div>