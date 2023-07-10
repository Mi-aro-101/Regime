<div class="row">
<div class="col-md-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
                <h4 class="card-title">Inserer un suivi de votre etat</h4>
                  <p class="card-description">
                    Horizontal form layout
                  </p>
                  <form class="forms-sample" method="post" action=<?php echo site_url("suivi/inserer");?>>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date : </label>
                      <div class="col-sm-9">
                        <input type="date"  name="date_suivi" class="form-control" id="exampleInputUsername2" placeholder="Username">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Poids : </label>
                      <div class="col-sm-9">
                        <input type="number" name="poids_suivi" class="form-control" id="exampleInputEmail2" placeholder="Email">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
        </div>
</div>