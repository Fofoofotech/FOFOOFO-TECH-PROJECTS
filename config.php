<?php
// error_reporting( ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING );
ini_set('display_errors', 1); 
error_reporting(E_ALL); 

//GLOBAL VARiABLES
global $subsql,$sql,$session,$config,$viewpage,$msg,$status,$target,$debug,$default_logo;
define("JPATH_ROOT", dirname(__FILE__));
define("DS",DIRECTORY_SEPARATOR);
define( 'JPATH_LIBRARIES',	 	JPATH_ROOT.DS.'library' );
define( 'JPATH_PLUGINS',		JPATH_ROOT.DS.'plugins'   );
define( 'JPATH_PUBLIC'	   ,	JPATH_ROOT.DS.'public' );
define( 'JPATH_MEDIA'	   ,	JPATH_ROOT.DS.'media' );
define( 'JPATH_CONFIGURATION' , JPATH_ROOT.DS.'configuration' );
define( 'DRIVER_IMAGES'       ,JPATH_MEDIA.DS.'image'.DS.'driver');


//Post Keeper
if($_REQUEST){
	foreach($_REQUEST as $key => $value){
		$prohibited = array('<script>','</script>','<style>','</style>');
		$value = str_ireplace($prohibited, "", $value);
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

class JConfigSMS {

	public $secret='22AckerMyCh77';
	public $debug = true;
	public $autoRollback = true;
	public $ADODB_COUNTRECS = false;
	private static $_instance;
	public $smsusername = "";
	public $smspassword = "";
	public $smsurl = "";

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

$configsms = JConfigSMS::getInstance();
include JPATH_LIBRARIES.DS."session.Class.php";
include JPATH_PLUGINS.DS."adodb".DS."adodb.inc.php";
include JPATH_CONFIGURATION.DS."configuration.php";
include JPATH_LIBRARIES.DS."sql.php";
include JPATH_LIBRARIES.DS."cryptCls.php";
include JPATH_LIBRARIES.DS."formating.Class.php";
include JPATH_LIBRARIES.DS."pagination.Class.php";
include JPATH_PLUGINS.DS."PHPExcel/PHPExcel.php";
include JPATH_PLUGINS.DS."fpdf".DS."fpdf.php";
// include JPATH_LIBRARIES.DS."upload.Class.php";



$admin_name=['1'=>'ADMIN','2'=>'IT MANAGER','3'=>'HR MANAGER','4'=>'DEVELOPER'];
$default_logo = 'media/images/gafx.jpg';
?>


