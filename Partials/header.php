<link type="text/css" rel="stylesheet" href="../css/bootstrap.css"  media="screen,projection"/>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="posts.php">Blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
         
                <li class="nav-item"><a class="nav-link" href="posts.php">Accueil</a></li>

        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){ ?>
            <li class="nav-item"><a class="nav-link" href="backoffice.php">Backoffice</a></li>
        <?php } ?>

        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'membre'){ ?>
            <li class="nav-item"><a class="nav-link" href="backofficeuser.php">Mes articles</a></li>
        <?php } ?>

        <?php if(empty($_SESSION)){ ?>
            <li class="nav-item"><a class="nav-link" href="inscription.php">Inscription</a></li>
            <li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>
        <?php } else { ?>
            <li class="nav-item"><a class="nav-link" href="add_post.php">Rédiger un article</a></li>
            <li class="nav-item"><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>
        <?php } ?>        
        
        </ul>
      </div>
    </div>
  </nav>
  <br/><br/><br/><br/>