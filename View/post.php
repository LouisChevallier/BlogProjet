<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <title>Post</title>
    </head>
    <body>

    <div class="container">
            <h1><?= strtoupper($post->title) ?></h1><hr>
                <p>Écrit par <?= $writer->username ?> le <?= $post->date ?></p><hr>
                <img class="img-fluid rounded" src="http://lorempixel.com/900/300" alt=""><hr>

                <p><?= $post->content ?></p><hr>

                <h6><?= $catego->name ?></h6><hr>

                
                <p><a href="../Controller/posts.php">Retour</a></p>
        <br/><br/><br/>

        <?php
        if(isset($success)){
            echo $success;
        }

        if(!empty($errors)):?>
            <?php foreach($errors as $error): ?>
            <p><?= $error ?></p>
            <?php  endforeach; ?>
        <?php endif; ?>

        <div class="card">
        <div class="card-header">
            <h2>Laisser un commentaire</h2></div><br/>
            <div class="card-body">
                <form action="post.php?id=<?= $post->id ?>" method="post">
                    <p><label for="author">Pseudo :</label><br/>
                    <input type="text" name="author" id="author" class="form-control" value="<?php if (isset($author)) echo $author ?>" /></p>
                    <p><label for="comment">Commentaire :</label><br/>
                    <textarea name="comment" id="comment" class="form-control" cols="30" rows="8"/><?php if (isset($comment)) echo $comment ?></textarea></p>
                    <button type="submit">Envoyer</button> 
                </form>
            </div>
        </div>
        <br/><hr>

        <div class="card">
            <div class="card-header">
            <h2>Commentaires</h2></div><br/>
                <?php foreach ($comments as $com):
                ?>
                <div class="card">
                    <h4><?= $com->author ?></h4>
                    <span><?= $com->comment ?></span>
                    <time><?= $com->date ?></time><br/>
                </div><br/>
                <?php endforeach; ?>

            </div>
        </div>
    </body>
</html>