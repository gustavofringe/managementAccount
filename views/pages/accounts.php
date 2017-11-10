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

                                <button  class="btn btn-danger mt-1" data-toggle="modal" data-target="#exampleModal">Supprimer</button>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      ...
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <form action="<?php echo BASE_URL; ?>/posts/delete/<?php echo $account->getAccountID(); ?>" method="post">
      <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
      
    </div>
  </div>
</div>
</div>