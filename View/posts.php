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
            <h1>Tous les articles</h1><br/>
                <div class="gridcard">
                <?php foreach ($posts as $post):

                $idWriter = $post->idUser;
                $writer = getWriter($idWriter);
                $idCatego = $post->idCategory;
                $catego = getCategory($idCatego);
                ?>
                    <div class="card">
                        <div class="card-image">
                            <img src="http://lorempixel.com/350/200/">
                        </div>

                        <div class="card-body">
                            <div>
                                <p>Écrit par <?= $writer->username ?> le <?= $post->date ?></p>
                                <span class="card-title"><?= $post->title ?></span>
                            </div>
                            <div class="card-content">
                                <p><?= $post->content ?></p>
                            </div>
                            <div>
                                <p><?= $catego->name ?></p>
                            </div>
                            <div class="card-action">
                                <a href="post.php?id=<?= $post->id ?>">Lire la suite</a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
                </div>
                <br/><br/><br/>
                <h2>Parcourir les catégories</h2><br/>
                    <div class="gridcard">
                        <?php foreach ($categories as $cat):
                        ?>
                            <div class="card">
                                <div>
                                    <a href="category.php?id=<?= $cat->id ?>"><span class="card-title"><?= $cat->name ?></span></a>
                                </div>
                            </div>

                        <?php endforeach; ?>
                </div>

        </div>
    </body>
</html>
