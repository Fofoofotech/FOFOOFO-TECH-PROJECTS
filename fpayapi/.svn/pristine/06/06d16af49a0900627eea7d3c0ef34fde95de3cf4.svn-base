<?php

class REST {

    public $_allow = array('*');
    public $_content_type = "application/json; charset=utf-8";
    public $_request = array();

    private $_method = array('GET','POST','PUT','DELETE');
    private $_code = 200;

    public $activekey ;

    public $saltencrypt ;
    public $pepperdecrypt;
    public $encryptkey;
    public $profileimgurl;
    public $articleimgurl;
    public $patientimgurl;
// End encryption

    public function __construct(){
        foreach($_REQUEST as $key => $value){
            $prohibited = array('<script>','</script>','<style>','</style>');
            $value =str_ireplace($prohibited,"",$value);
            $$key = @trim($value);
            //Start encryption
            //include("encrypt/keys.php");
            $activekey = '1';

//            $this->saltencrypt = $encryptkeys[$activekey]['salt'];
//            $this->pepperdecrypt =  $encryptkeys[$activekey]['pepper'];
//            $this->encryptkey =  $encryptkeys[$activekey]['enkey'];
            // End encryption
        }
        //Image Url
        $this->imgurl = 'https://smartrcs.com/api/media/';
        $this->webimgurl = 'https://smartrcs.com/media/';

        $this->inputs();
    }

    public function get_referer(){
        return $_SERVER['HTTP_REFERER'];
    }

    public function response($data,$status){
        $this->set_headers();
        $this->_code = ($status)?$status:200;

        echo json_encode($data);
        exit;
    }

    private function get_status_message(){
        $status = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported');
        return ($status[$this->_code])?$status[$this->_code]:$status[500];
    }

    public function get_request_method(){
        return $_SERVER['REQUEST_METHOD'];
    }

    private function inputs(){
        switch($this->get_request_method()){
            case "POST":
                //	$this->_request = $this->cleanInputs($_POST);
                //$this->response($_REQUEST,200);
                $this->_request = $this->cleanInputs($_POST);
                break;
            case "GET":
                $this->cleanInputs($_GET);
                // var_dump($_GET);
            break;
            case "DELETE":
                $this->_request = $this->cleanInputs($_GET);
            break;
            case "PUT":
            $this->_request=    json_decode(file_get_contents("php://input"));
                $this->_request = $this->cleanInputs($this->_request);
                break;
            default:
                $this->response('',406);
                break;
        }
    }

    private function cleanInputs($data){
        foreach($data as $key => $value){

            $prohibited = array('<script>','</script>','<style>','</style>');
            $value = str_ireplace($prohibited,"",$value);
            if(!is_array($value)){
                $this->$key = @trim($value);
            }else{
                $this->$key =$value;
            }
          
        
        }

    }

    private function set_headers(){
        @header('Access-Control-Allow-Origin:'.implode(',',$this->_allow ));
        @header('Access-Control-Allow-Methods:'.implode(',',$this->_method ));
        @header('Access-Control-Allow-Headers:Origin,Content-Type');
        @header("Content-Type:".$this->_content_type);
        @header("HTTP/1.1 ".$this->_code." ".$this->get_status_message());
    }
}
?>