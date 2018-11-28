<?php
require_once(__DIR__.DIRECTORY_SEPARATOR . join(DIRECTORY_SEPARATOR, array("..","config","Conf.php")));
class Model{
	public static $pdo;


	public static function Init(){
		$hostname=Conf::getHostname();
		$database_name=Conf::getDatabase();
		$login=Conf::getLogin();
		$password=conf::getPassword();
		try{
  			self::$pdo=new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password);
  			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
   
			self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch (PDOException $e) {
  			if (Conf::getDebug()) {
    			echo $e->getMessage(); 
  			} 
  			else {
    			echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
  			}
  			die();
  		}
		
	}

	public static function selectAll(){
		$table_name=static::$object;
		$class_name='Model';
	    $pdo=self::$pdo;
	    $table='P_'.ucfirst($table_name).'s';
	    $rep=$pdo->query("SELECT * FROM $table");
	    $rep->setFetchMode(PDO::FETCH_CLASS, $class_name.ucfirst($table_name));
	    $tab = $rep->fetchAll();
	    return $tab;
	}


	public static function select($primary_value){
		$table_name=static::$object;
		$class_name='Model';
		$primary_key=static::$primary;
		$table='P_'.ucfirst($table_name).'s';
		$sql = "SELECT * from $table WHERE $primary_key=:nom_tag";
	    $req_prep = Model::$pdo->prepare($sql);

	    $values = array(
	        "nom_tag" => $primary_value,
	    );   
	    $req_prep->execute($values);
	    $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name.ucfirst($table_name));
	    $tab = $req_prep->fetchAll();
	    if (empty($tab))
	        return false;
	    return $tab[0];
	}

	public static function delete($primary_value){
		$table_name=static::$object;
		$class_name='Model';
		$primary_key=static::$primary;
		$table='P_'.ucfirst($table_name).'s';
	    $req_prep=Model::$pdo->prepare("DELETE FROM $table WHERE $primary_key=:tag");

	    $values=array(
	      "tag" => $primary_value,
	      );
	    $req_prep->execute($values);
  }
}
Model::Init();

?>