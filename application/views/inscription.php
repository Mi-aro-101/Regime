<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href=<?php echo base_url("css/vendors/feather/feather.css");?>>
  <link rel="stylesheet" href=<?php echo base_url("css/vendors/ti-icons/css/themify-icons.css");?>>
  <link rel="stylesheet" href=<?php echo base_url("css/vendors/css/vendor.bundle.base.css");?>>
  <link rel="stylesheet" href=<?php echo base_url("css/bootstrap/bootstrap.min.css");?>>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href=<?php echo base_url("css/vertical-layout-light/style.css");?>>
  <!-- endinject -->
  <link rel="stylesheet" href=<?php echo base_url("image/favicon.png");?>>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <center><div class="brand-logo">
                <img src=<?php echo base_url("image/health-weight.svg");?> alt="logo">
              </div></center>
              <h4>Nouveau ?</h4>
              <h6 class="font-weight-light">Inscrivez-vous</h6>
              <form class="pt-3" action=<?php echo site_url("utilisateur/store");?> method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="nom_utilisateur" placeholder="Nom">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="mail_utilisateur" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="mot_de_passe_utilisateur1" placeholder="Mot De Passe">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="mot_de_passe_utilisateur2" placeholder="Confirmer Mot De Passe">
                </div>
                <div class="form-group">
                  
                  <?php foreach($genres as $genre){ ?>
                  <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="genre" value="<?php echo $genre->id_genre;?>" id="optionsRadios1">
                          <?php echo $genre->designation_genre; ?>
                        <i class="input-helper"></i>
                      </label>
                    </div>
                    <?php } ?>

                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Enregistrer">
                </div>
                <?php echo $this->session->flashdata('message'); ?>
            </form>
            <div class="text-center mt-4 font-weight-light">
              Avez-vous déja un compte? <a href=<?php echo site_url("index");?>  class="text-primary">Se Connecter</a>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>