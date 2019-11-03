<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Backoffice perso</title>
    </head>
    <body>
        <div class="container">
            <h1>Mes articles</h1><br/>

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
                            <form action="backofficeuser.php" method="post">
                                <td><button type="submit" name="delete" value="<?= $post->id ?>">X</button></td>
                                <td><a href="modify_post.php?id=<?= $post->id ?>">Éditer</a></td>
                            </form>
                    </tr>

                <?php endforeach; ?>

        </tbody>
    </table>
                </div>
        </div>
    </body>
</html>