<?php
App\Form::open();
?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Supprimer le compte</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <h2 class="mt-4">Détails du compte</h2>
    <!--table for see account selected-->
    <table class="table mt-5 mb-5">
        <thead>
        <tr>
            <th scope="col">Compte</th>
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
    <div class="form-group">
        <label for="exampleFormControlSelect1">Compte a créditer avant fermeture</label>
        <select class="form-control" id="exampleFormControlSelect1" name="credited">
            <?php foreach($accounts as $accounti):?>
                <?php if($accounti->getAccountID() !== $_GET['Id']):?>
                    <option value="<?php echo $accounti->getAccountID();?>"><?php echo $accounti->getName();?> (<?php echo $accounti->getBalance();?> €) </option>
                <?php endif;?>
            <?php endforeach;?>
        </select>
    </div>
</div>
<div class="modal-footer">
    <input type="hidden" name="accountID" value="<?php echo $account->getAccountID();?>">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button class="btn btn-danger">Supprimer</button>
</div>
<?php
App\Form::close();
?>