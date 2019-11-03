<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Backoffice</title>
    </head>
    <body>
        <div class="container">
            <h1>Backoffice</h1><br/>
            <h2>Backoffice - Posts</h2><br/>

            <?php
        if(isset($success)){
            echo $success;
        }

        if(!empty($errors)):?>
            <?php foreach($errors as $error): ?>
            <p><?= $error ?></p>
            <?php  endforeach; ?>
        <?php endif; ?>


            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>Categorie</th>
                        <th>Auteur</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

        <tbody>

                <?php foreach ($posts as $post):

                $idWriter = $post->idUser;
                $writer = getWriter($idWriter);
                $idCatego = $post->idCategory;
                $catego = getCategory($idCatego);
                ?>

                    <tr>
                        <td><?= $post->title ?></td>
                        <td><?= $post->content ?><a href="post.php?id=<?= $post->id ?>">..Lire la suite</a></td>
                        <td><?= $post->date ?></td>
                        <td><?= $catego->name ?></td>
                        <td><?= $writer->username ?></td>
                            <form action="backoffice.php" method="post">
                                <td><button type="submit" name="delete" value="<?= $post->id ?>">X</button></td>
                                <td><a href="modify_post.php?id=<?= $post->id ?>">Éditer</a></td>
                            </form>
                    </tr>

                <?php endforeach; ?>

        </tbody>
    </table>

                
                
                
    <br/><br/><br/><h2>Backoffice - Catégories</h2><br/>

            <?php
        if(isset($success)){
            echo $success;
        }

        if(!empty($errors)):?>
            <?php foreach($errors as $error): ?>
            <p><?= $error ?></p>
            <?php  endforeach; ?>
        <?php endif; ?>


            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom de la catégorie</th>
                        <th>Nombre d'articles</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

        <tbody>

                <?php foreach ($categories as $cat):

                $idCatego = $cat->id;
                //$nbPostsbyCategory = getNbPostsByCategory($idCatego);
                
                ?>

                    <tr>
                        <td><?= $cat->id ?></td>
                        <td><?= $cat->name ?></td>
                            <form action="backoffice.php" method="post">
                                <td><button type="submit" name="deleteCat" value="<?= $cat->id ?>">X</button></td>
                                <td></td>
                                <td><a href="#">Éditer</a></td>
                            </form>
                    </tr>

                <?php endforeach; ?>

        </tbody>
    </table>

<div class='card'>
    
                        <form action="backoffice.php" method="post">
                        <div class='card-header'>
                        <p><label for="namecat">Nouvelle catégorie :</label></div><br/>
                        <div class='card-body'>
                        <input type="text" name="namecat" id="namecat" class="form-control" value="<?php if (isset($namecat)) echo $namecat ?>" /></p>
                            <button type="submit" name="addcat" value="<?= $post->id ?>">Ajouter cette catégorie</button></div>
                        </form>
                </div>
            </div>
    </div>  





        </div>
    </body>
</html>