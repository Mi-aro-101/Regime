<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=<?php echo site_url("utilisateur/store");?> method="post">
        <p><input type="text" name="nom_utilisateur"></p>
        <p><button type="submit">S'inscrire</button></p>
    </form>
</body>
</html>