<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href=<?php echo base_url("css/bootstrap/bootstrap.min.css");?>>
</head>
<body>
    <form action=<?php echo site_url("utilisateur/store");?> method="post">
        <p>Nom : <input type="text" name="nom_utilisateur"></p>
        <p>Mail : <input type="mail" name="mail_utilisateur" id=""></p>
        <p>Mot de passe : <input type="password" name="mot_de_passe_utilisateur1"></p>
        <p>Reconfirmer mot de passe : <input type="password" name="mot_de_passe_utilisateur2"></p>
        <p><button type="submit">S'inscrire</button></p>
    </form>
    <?php echo $this->session->flashdata('message'); ?>
</body>
</html>