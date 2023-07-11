<div class="col-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <h4 class="card-title">Entrer un nouveau code</h4>
        <form class="forms-sample" action=<?php echo site_url("backoffice/Code/insert_code");?> method="post">
        <div class="form-group">
            <label for="exampleInputName1">Code</label>
            <input type="number" class="form-control" name="code" id="exampleInputName1" placeholder="Code" minlength="4" required>
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Montant</label>
            <input type="number" class="form-control" name="montant" id="exampleInputName1" placeholder="Montant" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
        </form>
    </div>
    </div>
</div>