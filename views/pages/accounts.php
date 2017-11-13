<h2 class="mt-4 mb-4 text-center">Vos comptes</h2>


<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <!--start table-->
            <table id="table" class="table table-bordered table-hover mb-5">
                <thead>
                <tr>
                    <th scope="col">Compte(s)</th>
                    <th scope="col">Solde en euro</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <!--get datas-->
                <?php foreach ($accounts as $account) : ?>

                    <tr>
                        <th><?php echo $account->getName(); ?></th>

                        <td>
                            <div <?php echo $account->getBalance() > 0 ? '' : "style='color:red'"; ?>><?php echo $account->getBalance(); ?></div>
                        </td>
                        <td>
                            <div class="btn-group-vertical">
                                <a class="btn btn-secondary"
                                   href="<?php echo BASE_URL; ?>/posts/add/<?php echo $account->getAccountID(); ?>">Créditer</a>
                                <a class="btn btn-secondary mt-1"
                                   href="<?php echo BASE_URL; ?>/posts/sub/<?php echo $account->getAccountID(); ?>">Débiter</a>
                                <?php if ($count > 1) : ?>
                                    <a href="" class="btn btn-danger mt-1 LinkModal" data-target="#exampleModal"
                                       data-toggle="modal" rel="<?php echo $account->getAccountID(); ?>">
                                        Supprimer
                                    </a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        </div>
    </div>
</div>