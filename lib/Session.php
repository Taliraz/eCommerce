<?php
class Session {
    public static function is_user($login) {
        return (!empty($_SESSION['loginUtilisateur']) && ($_SESSION['loginUtilisateur'] == $login));
    }

    public static function is_admin() {
    	return (!empty($_SESSION['estAdmin']) && $_SESSION['estAdmin']);
	}
}
?>