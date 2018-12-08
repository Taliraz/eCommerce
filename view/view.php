<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle;?></title>
        <?php echo '<link rel="stylesheet" type="text/css" href="'.File::build_path_css(array("view", "view.css")).'">'?>
    </head>
    <body>
        <header>
            <ul id="menu">
                <a href="index.php?controller=Produit&action=readAll">
                    <li class="menu_button">
                        <span>Produits</span>
                    </li>
                </a>
                <a href="index.php?controller=panier&action=readAll"><li class="menu_button">Mon Panier</li></a>
                <?php if(Session::is_admin()){
                    echo '<a href="index.php?controller=Utilisateur&action=readAll"><li class="menu_button">Modération</li></a>';
                    echo '<a href="index.php?controller=commande&action=readAll"><li class="menu_button">Commandes</li></a>';
                    echo '<a href="index.php?controller=Utilisateur&action=disconnect"><li class="menu_button" id="menu_button_from_right">Deconnexion</li></a>';
                    echo '<a href="index.php?controller=Utilisateur&action=read&loginUtilisateur='.$_SESSION['loginUtilisateur'].'"><li class="menu_button" id="menu_button_from_right2">Mon Profil</li></a>';
                } 
                else if (isset($_SESSION['loginUtilisateur']) && Session::is_user($_SESSION['loginUtilisateur'])) {
                    echo '<a href="index.php?controller=Utilisateur&action=disconnect"><li class="menu_button" id="menu_button_from_right">Deconnexion</li></a>';
                    echo '<a href="index.php?controller=Utilisateur&action=read&loginUtilisateur='.$_SESSION['loginUtilisateur'].'"><li class="menu_button" id="menu_button_from_right2">Mon Profil</li></a>';
                }
                else {
                    echo '<a href="index.php?controller=Utilisateur&action=connect"><li class="menu_button" id="menu_button_from_right">Connexion</li></a>';
                    echo '<a href="index.php?controller=Utilisateur&action=create"><li class="menu_button" id="menu_button_from_right2">Inscription</li></a>';
                }?>
            </ul>
        </header>
        <?php
            $filepath = File::build_path(array("view", $controller, "$view.php"));
            require $filepath;?>
        </div>
    </body>
</html>



