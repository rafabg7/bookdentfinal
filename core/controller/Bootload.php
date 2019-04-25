<?php



class Bootload {
	/**
	* @function load
	*  la funcion load carga un boot correspondiente a un modulo
	**/	
	public static function load($view){
		// Module::$module;
		if(!isset($_GET['view'])){
			include "core/modules/".Module::$module."/boot/".$view."/boot-default.php";
		}else{


			if(self::isValid()){
				$fullpath = "core/modules/".Module::$module."/boot/".$_GET['view']."/boot-default.php";
				include $fullpath;				
			}else{
				self::Error("<b>404 NOT FOUND</b> Boot <b>".$_GET['view']."</b> folder  !!");
			}

		}
	}

	/**
	* @function isValid
	*  valida la existencia de una vista
	**/	
	public static function isValid(){
		$valid=false;
		if(file_exists($file = "core/modules/".Module::$module."/boot/".$_GET['view']."/boot-default.php")){
			$valid = true;
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

}




?>