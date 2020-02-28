<?php
//GLOBAL VARiABLES
global $sql,$session,$config,$target,$viewpage,$msg,$status,$pg,$view,$currency,$profileImgUrl;
define("SPATH_ROOT",dirname(__FILE__));
define("DS",DIRECTORY_SEPARATOR);
define( 'SPATH_LIBRARIES',	 	SPATH_ROOT.DS.'library' );
define( 'SPATH_PLUGINS',		SPATH_ROOT.DS.'plugins'   );
define( 'SPATH_PUBLIC'	   ,	SPATH_ROOT.DS.'public' );
define( 'SPATH_MEDIA'	   ,	SPATH_ROOT.DS.'media' );
define( 'SPATH_CONFIGURATION' , SPATH_ROOT.DS.'configuration' );
define( 'SHOST_IMAGES'	   ,	SPATH_MEDIA.DS.'uploaded/' );
define( 'SPATH_APIFUNCTIONS' , SPATH_ROOT.DS.'functions' );
define( 'SPATH_ENCRYPT',	 	SPATH_ROOT.DS.'encrypt' );
define( 'SPATH_PHOTO'	   ,	SPATH_MEDIA.DS.'clientphotos/' );
define( 'SPATH_TRANS_REC'	   ,	SPATH_MEDIA.DS.'transactiondailyrec/' );

define( 'SPATH_FLASHDB'	   ,	SPATH_MEDIA.DS.'flashdb/' );


//Post Keeper
if($_REQUEST){
	foreach($_REQUEST as $key => $value){
		$prohibited = array('<script>','</script>','<style>','</style>');
		$value = str_ireplace($prohibited,"",$value);
		$$key = @trim($value);
	}
}
if($_FILES){
		foreach($_FILES as $keyimg => $values){
			foreach($values as $key => $value){
				$$key = $value;
				}
		}

	}
//SYSTEM TIMEZONE FORMAT
date_default_timezone_set('UTC');

class JConfig {

	public $secret='22AckerMyCh77';
	public $debug = false;
	public $autoRollback= true;
	public $ADODB_COUNTRECS = false;
	private static $_instance;
	public $smsusername ="";
	public $smspassword="";
	public $smsurl="";

	public function __construct(){
	}

	private function __clone(){}

	public static function getInstance(){
	if(!self::$_instance instanceof self){
	     self::$_instance = new self();
	 }
	    return self::$_instance;
	}

}

$config = JConfig::getInstance();



//included classes
include SPATH_LIBRARIES.DS."engine.Class.php";
include SPATH_LIBRARIES.DS."session.Class.php";
include SPATH_PLUGINS.DS."adodb".DS."adodb.inc.php";
include SPATH_CONFIGURATION.DS."configuration.php";
include SPATH_LIBRARIES.DS."sql.php";
include SPATH_LIBRARIES.DS."cryptCls.php";
include SPATH_LIBRARIES.DS."import.Class.php";    
include SPATH_LIBRARIES.DS."encryptAES.Class.php"; 
include SPATH_LIBRARIES . DS . "clientClass.php";
include SPATH_LIBRARIES . DS . "smartsms.Class.php";




$profileImgUrl = 'http://192.168.0.5/api_temple/media/uploads/profiles/';
spl_autoload_register(function ($class_name) {
    include SPATH_APIFUNCTIONS.DS. $class_name . '.php';
});