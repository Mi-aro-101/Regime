<title>Confirmeation de code</title>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Confirmation de Code</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>Id Client</th>
                            <th>Client</th>
                            <th>Code</th>
                            <th>Montant</th>
                            <th>date d'envoi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($donnees as $donnee){?>
                            <tr>
                                <td><h4><?php echo $donnee['id_utilisateur']; ?></h4></td>
                                <td><h4><?php echo $donnee['nom_utilisateur']; ?></h4></td>
                                <td><h4><?php echo $donnee['code']; ?></h4></td>
                                <td><h4><?php echo $donnee['montant']; ?></h4></td>
                                <td><h4><?php echo $donnee['date_envoi']; ?></h4></td>
                                <td><button class="btn btn-success btn-rounded btn-fw" ><a href=<?php echo site_url("backoffice/Confirmation_code/acceptation_code").'?id_code='.$donnee['id_code'].'&id_utilisateur='.$donnee['id_utilisateur'].'&montant='.$donnee['montant'];?> style="text-decoration:none;color: white;">Valider</a></button></td>
                                <td><button class="btn btn-danger btn-rounded btn-fw" ><a href=<?php echo site_url("backoffice/Confirmation_code/refus_code").'?id_code='.$donnee['id_code'].'&id_utilisateur='.$donnee['id_utilisateur'];?> style="text-decoration:none;color: white;">Refuser</a></button></td>
                            </tr>
                        <?php } ?>    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>