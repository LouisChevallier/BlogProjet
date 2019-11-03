<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Posts</title>
    </head>
    <body>
        <div class="container">
            <h1>Ajouter un article</h1><br/>
            
            <form action="add_post.php" method="post">
                <p><label for="category">Sujet de l'article</label><br/>
                <select class="browser-default" name="category" id="category">
                    <option value="">--Choisir une catégorie--</option>
                    <?php foreach ($categories as $cat):
                        ?>
                            <option value="<?= $cat->id?>"><?= $cat->name?></option>
                    <?php endforeach; ?>
                    
                </select>
                <p><label for="title">Titre de l'article</label><br/>
                <input type="text" name="title" id="title" class="form-control" value="<?php if (isset($title)) echo $title ?>" /></p>
                <p><label for="title">Image mise en avant</label><br/>
                <input type="file" name="image" class="form-control"></p>
                <p><label for="content">Rédigez votre article ici</label><br/>
                <textarea name="content" id="content" cols="100" rows="15" class="form-control"/><?php if (isset($content)) echo $content ?></textarea></p>
                <button type="submit">Publier</button> 
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