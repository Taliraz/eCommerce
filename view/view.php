<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
        <?php echo '<link rel="stylesheet" type="text/css" href="'.File::build_path_css(array("view", "view.css")).'">' ?>
    </head>
    <header>
       <?php echo '<a href="index.php?action=connect&controller=utilisateur">Connexion </a>';?>
    </header>
    <body>
        <?php
            $filepath = File::build_path(array("view", $controller, "$view.php"));
            require $filepath;
        ?>
        </div>
    </body>
</html>