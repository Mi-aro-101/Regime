<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href=<?php echo base_url("css/bootstrap/bootstrap.min.css");?>>
</head>
<body>
    <form action=<?php echo site_url("utilisateur/authentifier") ;?> method="post">
        <p>email : <input type="mail" name="mail_utilisateur" value="itu@gmail.com"></p>
        <p>Mot de passe : <input type="password" name="mot_de_passe_utilisateur" value="123"></p>
        <button type="submit">Se connecter</button>
    </form>
    <p>Vous n'avez pas encore de compte? <a href=<?php echo site_url("utilisateur/inscription");?>>s'inscrire</a></p>
    <?php echo $this->session->flashdata('message'); ?>
</body>
</html>