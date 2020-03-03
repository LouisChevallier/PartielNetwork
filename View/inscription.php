<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Signin</title>
    </head>
    <body>
        <h1>Inscription</h1>

        <?php
        if(isset($success)){
            echo $success;
        }

        if(!empty($errors)):?>
            <?php foreach($errors as $error): ?>
            <p><?= $error ?></p>
            <?php  endforeach; ?>
        <?php endif; ?>


        <form action="inscription.php" method="post">
            <p><label for="mail">Mail :</label><br/>
            <input type="text" name="mail" id="mail" class="form-control" value="<?php if (isset($mail)) echo $mail ?>" /></p>
            <p><label for="username">Pseudo :</label><br/>
            <input type="text" name="username" id="username" class="form-control" value="<?php if (isset($username)) echo $username ?>" /></p>
            <p><label for="mdp">Mot de passe :</label><br/>
            <input type="password" name="mdp" id="mdp" class="form-control" value="<?php if (isset($mdp)) echo $mdp ?>"/></p>
            <p><label for="mdp2">Confirmez le mot de passe :</label><br/>
            <input type="password" name="mdp2" id="mdp2" class="form-control"/></p>
            <button type="submit">S'inscrire</button> 
        </form><br/>


    </body>
</html>