<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>
        <div>
        <?php
        // Si $controleur='voiture' et $view='list',
        // alors $filepath="/chemin_du_site/view/voiture/list.php"
        $filepath = File::build_path(array("view", $controller, "$view.php"));
        require $filepath;
        ?>
        </div>
        <p style="border: 1px solid black;text-align:right;padding-right:1em;background-color:pink;"> Site de covoiturage de QUALITE</p>
    </body>
</html>