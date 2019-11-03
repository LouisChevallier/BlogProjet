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
            <h1>Modify Post</h1>
            
            <form action="modify_post.php?id=<?= $oldpost->id ?>" method="post">
                <p><label for="category">Modifier le sujet de l'article</label><br/>
                <select class="browser-default" name="category" id="category" required>
                    <option value="<?= $oldcatego->id?>"><?= $oldcatego->name?></option>
                    <?php foreach ($categories as $cat):
                        ?>
                            <option value="<?= $cat->id?>"><?= $cat->name?></option>
                    <?php endforeach; ?>
                    
                </select>
                <p><label for="title">Titre de l'article</label><br/>
                <input type="text" name="title" id="title" class="form-control" value="<?= $oldpost->title ?>" required/></p>
                <p><label for="title">Modifiez l'image mise en avant</label><br/>
                <input type="file" name="image" class="form-control"></p>
                <p><label for="content">Modifiez votre article ici</label><br/>
                <textarea name="content" id="content" cols="100" rows="15" class="form-control" required/><?php if (isset($oldpost)) echo $oldpost->content ?></textarea></p>
                <button type="submit" name="modify">Valider les modifications</button> 
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