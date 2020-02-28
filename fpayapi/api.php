<?php
/*
    This is an example class script proceeding secured API
    To use this class you should keep same as query string and function name
    Ex: If the query string value rquest=delete_user Access modifiers doesn't matter but function should be
         function delete_user(){
             You code goes here
         }
    Class will execute the function dynamically;

    usage :

        $object->response(output_data, status_code);
        $object->_request	- to get santinized input

        output_data : JSON (I am using)
        status_code : Send status message for headers

    Add This extension for localhost checking :
        Chrome Extension : Advanced REST client Application
        URL : https://chrome.google.com/webstore/detail/hgmloofddffdnphfgcellkdfbfbjeloo

    I used the below table for demo purpose.

    CREATE TABLE IF NOT EXISTS `users` (
      `user_id` int(11) NOT NULL AUTO_INCREMENT,
      `user_fullname` varchar(25) NOT NULL,
      `user_email` varchar(50) NOT NULL,
      `user_password` varchar(50) NOT NULL,
      `user_status` tinyint(1) NOT NULL DEFAULT '0',
      PRIMARY KEY (`user_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
 */

require_once("Rest.inc.php");
require_once("config.php");
class API extends REST {


    public function __construct(){
        parent::__construct();
    }

    /*
     * Public method for access api.
     * This method dynmically call the method based on the query string
     *
     */
    public function processApi(){
    
        if (isset($_REQUEST['token']) || json_decode(file_get_contents("php://input"))->token ){
            
            // var_dump($_REQUEST);exit;

            // echo $_REQUEST['token'];exit;
    
            $function=  new oauthuser();
            // var_dump($function->Init());exit;

            if ($function->Init()===true){
                if (isset($_REQUEST['actions']) || json_decode(file_get_contents("php://input"))->actions){
                    $func = (isset($_REQUEST['actions'])) ? strtolower(trim(str_replace("/","",$_REQUEST['actions']))) : json_decode(file_get_contents("php://input"))->actions;

                    // echo $func;
                }
                if(!@class_exists($func)){
                    $this->response('No class',404);
                }else{
                    $function=  new $func();
                    $function->Init();
                }
            }else{
                switch ( $func = strtolower(trim(str_replace("/","",$_REQUEST['actions']))))
                {
                  
                    case'loginclient':
                        $function=  new loginclient();
                        $function->Init();
                    break;

                    case'logoutclient':
                        $function=  new logoutclient();
                        $function->Init();
                    break;
                    
                    case'registerclient':
                        $function=  new registerclient();
                        $function->Init();
                    break;


                    default:
                        $this->response('No Response',404);
                    break;
                }


            }
        }

    }

    /*
     *	Simple login API
     *  Login must be POST method
     *  email : <USER EMAIL>
     *  pwd : <USER PASSWORD>
    /*
     *	Encode array into JSON
    */
    private function json($data){
        if(is_array($data)){
            return json_encode($data);
        }
    }
}

// Initiiate Library

$api = new API;
$api->processApi();
?>