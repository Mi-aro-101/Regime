
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
            <h4 class="card-title">Inserer un plat</h4>
            <form class="forms-sample" method="post" action=<?php echo site_url("backoffice/plat/inserer"); ?>>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Plat : </label>
                    <div class="col-sm-9">
                    <select  name="id_plat" class="form-control" id="exampleSelectGender">
                            <?php foreach ($plat_liste as $plat) { ?>
                                <option value="<?php echo $plat->id_plat;?>"><?php echo $plat->designation_plat;?></option>
                            <?php } ?>
                    </div>
                </div>

                <div class="form-group  row">
                  
                  <?php foreach($objectifs as $objectif){ ?>
                  <div class="form-check">
                      <label class="form-check-label"> Objectif
                        <input type="radio" class="form-check-input" name="id_objectif" value="<?php echo $objectif->id_objectif;?>" id="optionsRadios1">
                          <?php echo $objectif->reference_objectif; ?>
                        <i class="input-helper"></i>
                      </label>
                    </div>
                    <?php } ?>

                </div>
                    <button type="submit" class="btn btn-info mr-2">Soumettre</button>
            </form>
    </div>
 </div>
</div>