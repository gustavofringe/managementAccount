<h2 class="mt-4 text-center">Vos comptes</h2>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <!--start table-->
            <table class="table table-bordered table-hover mb-5" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th scope="col">Compte(s)</th>
                    <th scope="col">Solde en euro</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <!--get datas-->
                <?php foreach ($accounts as $account): ?>
                    <tr>
                        <th scope="row"><?php echo $account->getName(); ?></th>
                        <td scope="row" style="color:<?php echo $color;?>" class="error"><?php echo $account->getBalance(); ?>€</td>
                        <td>
                            <div class="btn-group-vertical">
                                <a class="btn btn-secondary"
                                   href="<?php echo BASE_URL; ?>/posts/add/<?php echo $account->getAccountID(); ?>">Créditer</a>
                                <a class="btn btn-secondary mt-1"
                                   href="<?php echo BASE_URL; ?>/posts/sub/<?php echo $account->getAccountID(); ?>">Débiter</a>

                                <a class="btn btn-danger mt-1"
                                   href="<?php echo BASE_URL; ?>/posts/delete/<?php echo $account->getAccountID(); ?>"
                                   onclick="return confirm('Voulez vous vraiment le supprimer?');">Supprimer</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>