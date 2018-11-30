<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
        <?php echo '<link rel="stylesheet" type="text/css" href="'.File::build_path_css(array("view", "view.css")).'">' ?>
    </head>
    <header>
       <?php 
       if (isset($_SESSION['loginUtilisateur'])){
            echo '<p><a href="index.php?controller=utilisateur&action=read&loginUtilisateur='.$_SESSION['loginUtilisateur'].'">'.$_SESSION['loginUtilisateur'].'</a>
             <a href="index.php?controller=utilisateur&action=disconnect">Déconnexion</a></p>';
       }
       else{
            echo '<a href="index.php?action=connect&controller=utilisateur">Connexion </a>';
        }
        ?>
    </header>
    <body>
        <?php
            $filepath = File::build_path(array("view", $controller, "$view.php"));
            require $filepath;
        ?>
        </div>
    </body>
</html>