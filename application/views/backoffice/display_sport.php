<div class="row">
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
            <h4 class="card-title">Inserer un sport</h4>
            <form class="forms-sample" method="post" action=<?php echo site_url("backoffice/sport/inserer"); ?>>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Sport : </label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control"  name="designation_sport" id="exampleInputUsername2" placeholder="Designation sport">
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
                  <h4 class="card-title">Liste des sports</h4>
                  <?php echo $this->session->flashdata('message'); ?>
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <?php foreach ($sports as $sport){ ?>
                            <tr>
                                <td><label for=""><?php echo $sport->designation_sport; ?></label></td>
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
        </div>
    </div>
</div>