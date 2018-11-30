<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
        <?php echo '<link rel="stylesheet" type="text/css" href="'.File::build_path_css(array("view", "view.css")).'">' ?>
    </head>
    <body>
        <header>
            <ul id="menu">
                <a href="index.php"><li class="menu_button">Accueil</li></a>
                <a href="index.php?controller=Produit&action=readAll">
                    <li class="menu_button"><span>Produits</span>
                        <ul class="sub_menu">    
                            <a href="#"><li>Liste</li></a>
                            <a href="#"><li>Autre chose</li></a>
                            <a href="#"><li>Paul l'a dit</li></a>
                        </ul>
                    </li>
                </a>
                <?php if(Session::is_admin()) {
                    echo '<li class="menu_button">Modération</li>';
                } 
                else if (isset($_SESSION['loginUtilisateur']) && Session::is_user($_SESSION['loginUtilisateur'])) {
                    echo '<li class="menu_button">Mon Panier</li>';
                }
                else {
                    echo '<a href="index.php?controller=Utilisateur&action=connect"><li class="menu_button" id="menu_button_connect">Connexion</li></a>';
                }

                ?>
                
            </ul>
        </header>
   
        <?php
            $filepath = File::build_path(array("view", $controller, "$view.php"));
            require $filepath;
        ?>
        </div>
    </body>
</html>



