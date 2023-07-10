
<!DOCTYPE html>
<html>
<head>
    <title>Suivi de votre poids depuis votre inscription</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="row">
        <div class="card-body">
            <canvas id="areaChart" width="465" height="232"></canvas>
        </div>

        <div class="card">
                <div class="card-body">
                  <h4 class="card-title">A propos de vous</h4>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nom : </label>
                      <div class="col-sm-9">
                        <strong><label for="exampleInputUsername2" class="col-sm-4 col-form-label"><?php echo $_SESSION['utilisateur']->nom_utilisateur;?></label></strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Taille : </label>
                      <div class="col-sm-9">
                        <strong><label for="exampleInputUsername2" class="col-sm-4 col-form-label"><?php echo $suivis[0]['taille'];?></label></strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Poids avant :</label>
                      <div class="col-sm-9">
                        <!-- <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password"> -->
                        <input type="text" readonly class="form-control-plaintext" id="exampleInputConfirmPassword2" value="<?php echo $suivis[0]['poids'];?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Poids actuel : </label>
                      <div class="col-sm-9">
                        <strong><label for="exampleInputUsername2" class="col-sm-4 col-form-label"><?php echo $suivis[count($suivis)-3]['poids_suivi'];?></label></strong>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

    </div>

    <script>
        // Assuming you have the retrieved data stored in variables: values and dates
        var values =  <?php echo $poids_suivis;?>;  // Sample values
        var dates =  <?php echo $date_suivis; ?>;  // Sample dates

        // Create a new chart using chart.js
        var ctx = document.getElementById('areaChart').getContext('2d');
        var areaChart = new Chart(ctx, {
            type: 'line',  // Use 'line' type for area chart
            data: {
                labels: dates,  // Set the weekly dates as labels on the x-axis
                datasets: [{
                    label: 'Poids',
                    data: values,  // Set the values as data points on the y-axis
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',  // Set the background color for the area
                    borderColor: 'rgba(0, 123, 255, 1)',  // Set the border color for the area
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
</body>
</html>
