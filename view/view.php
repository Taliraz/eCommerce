<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
        <?php echo '<link rel="stylesheet" type="text/css" href="'.File::build_path_css(array("view", "view.css")).'">' ?>
    </head>
    <body>
        <?php
            $filepath = File::build_path(array("view", $controller, "$view.php"));
            require $filepath;
        ?>
        </div>
        <p style="border: 1px solid black;text-align:right;padding-right:1em;background-color:pink;"> caillou</p>
    </body>
</html>