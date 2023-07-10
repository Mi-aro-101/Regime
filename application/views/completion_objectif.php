<link rel="stylesheet" href=<?php echo base_url("css/bootstrap/bootstrap.min.css"); ?>>
<link rel="stylesheet" href=<?php echo base_url("css/mystyle.css"); ?>>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body myform">
                <h4 class="card-title">A propos de vous</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Poids</label>
                        <input type="number" class="form-control" id="exampleInputUsername1" placeholder="Poids">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Taille</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Taille">
                    </div>
                <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body myform">
                <h4 class="card-title">Votre objectif</h4>
                <form class="forms-sample">
                <div class="form-group">
                    <label for="exampleSelectGender">Type de regime</label>
                    <select class="form-control" id="exampleSelectGender">
                        <?php foreach($objectifs as $objectif){ ?>
                            <option value="<?php echo $objectif->id_objectif;?>"><?php echo $objectif->reference_objectif;?></option>
                        <?php } ?>
                    </select>
                </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Valeur (en kg)</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Valeur">
                    </div>
                <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
                </form>
            </div>
        </div>
    </div>
</div>