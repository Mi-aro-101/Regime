<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
                  <h4 class="card-title">Basic Table <?php echo $codes[0]['id_code']; ?></h4>
                  <p class="card-description">
                    Add class <code>.table</code>
                  </p>
                  <?php echo $this->session->flashdata('message'); ?>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Code</th>
                          <th>Montant</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($codes as $code){ ?>
                            <tr>
                                <td><?php echo $code['code']; ?></td>
                                <td><?php echo $code['montant']; ?></td>
                                <td><a href=<?php echo site_url("porte_feuille_utilisateur/demander_code/".$code['id_code']);?>>
                                        <button class="btn btn-success"
                                            <?php if($code['id_utilisateur'] == $_SESSION['utilisateur']->id_utilisateur){ echo 'disabled';}?> >
                                            Acheter
                                        </button>
                                    </a></td>
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
        </div>
    </div>
</div>