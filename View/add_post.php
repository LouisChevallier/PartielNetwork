<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Publier du contenu</title>
    </head>
    <body>
        <div class="container">
            <h1>Partager du contenu avec la communauté</h1><br/>
            
            <form action="add_post.php" method="post">
                <p><label for="category">Sujet de l'article</label><br/>
                <select class="browser-default" name="category" id="category">
                    <option value="">--Choisir un type de contenu --</option>
                            <option value="image">Image</option>
                            <option value="image">Lien externe</option>
                            <option value="image">Video</option>
                </select>
                <p><label for="link">Link contenu</label><br/>
                <input name="link" id="link" class="form-control"/></p>
                <p><label for="content">Description</label><br/>
                <textarea name="content" id="content" cols="100" rows="15" class="form-control"/><?php if (isset($content)) echo $content ?></textarea></p>
                <button type="submit">Soumettre</button> 
            </form><br/>
        </div>


        <?php
        if(isset($success)){
            echo $success;
        }

        if(!empty($errors)):?>
            <?php foreach($errors as $error): ?>
            <p><?= $error ?></p>
            <?php  endforeach; ?>
        <?php endif; ?>

    </body>
</html>