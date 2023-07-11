    <title><i class="mdi mdi-food-fork-drink menu-icon"></i>Plats</title>
<div class="row">
<?php 
    $design['Petit dejeuner'] = "badge badge-success";
    $design['Dejeuner'] = "badge badge-warning";
    $design['Diner'] = "badge badge-info";
?>
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
            <h4 class="card-title">Inserer un plat</h4>
            <form class="forms-sample" method="post" action=<?php echo site_url("backoffice/plat/inserer"); ?>>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Plat : </label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control"  name="designation_plat" id="exampleInputUsername2" placeholder="Designation plat">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <select  name="moment_journee" class="form-control" id="exampleSelectGender">
                            <?php foreach ($categories as $categorie) { ?>
                                <option value="<?php echo $categorie->id_moment_journee;?>"><?php echo $categorie->reference_moment_journee;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                    <button type="submit" class="btn btn-info mr-2">Soumettre</button>
            </form>
    </div>
 </div>
</div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
                  <h4 class="card-title">Liste des plats</h4>
                  <?php echo $this->session->flashdata('message'); ?>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Plat</th>
                          <th>Categorie</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($plat_liste as $plat){ ?>
                            <tr>
                                <td><label for=""><?php echo $plat['designation_plat']; ?></label></td>
                                <td><label class="<?php echo $design[$plat['reference_moment_journee']];?>" for=""><?php echo $plat['reference_moment_journee']; ?></label></td>
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
        </div>
    </div>
</div>