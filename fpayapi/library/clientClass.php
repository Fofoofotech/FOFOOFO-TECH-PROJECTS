<?php

/**
 * Created by PhpStorm.
 * User: S3L0RM
 * Date: 1/17/2018
 * Time: 3:40 PM
 */
class clientClass
{
    public  $sql;
    public $session;
    public $phpmailer;
    function  __construct() {
        global $sql,$session,$phpmailer;
        $this->session= $session;
        $this->sql = $sql;
        $this->phpmailer = $phpmailer;
    }


    /**
     * Function for all code generations
     * @param $table
     * @param $prefix
     * @param $code_column
     * @return string
     */
    public function generateCode($table, $prefix, $code_column){
        $code_column = strtoupper($code_column);
//        die(var_dump($id_column));
        $no_prec = 10;#Maximum number of preceding Zeros;
        $pref_len = strlen($prefix);
        $pref_len_m = $pref_len+1;
        $surplus = $no_prec - $pref_len;
//        var_dump($surplus);
//        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT max($code_column) AS {$code_column}   FROM {$table}  LIMIT 1"));
        $stmt = $this->sql->Execute($this->sql->Prepare("SELECT  MAX(CAST( SUBSTRING({$code_column} FROM {$pref_len_m}) AS UNSIGNED)) AS {$code_column}  FROM {$table} LIMIT 1"));
        print $this->sql->ErrorMsg();
//        die()
        if($stmt->RecordCount() > 0){
            $obj = $stmt->FetchNextObject();
            $prev_code = $obj->$code_column;
//            $just = substr($prev_code,$pref_len);
            $next_code = $prev_code + 1;
//            die(var_dump([$next_code,$prev_code]));

//            var_dump($next_code);
//            die();
            $multiplier = $no_prec - strlen($next_code);
            $multiplier = $multiplier <= 0 ? 0 : $multiplier ;
            $code = str_repeat("0",$multiplier) . $next_code;
//            var_dump([$multiplier,$code]);
//            die();
        }else{
            $code = str_repeat("0",$no_prec) . 1;
        }

        return $prefix.$code;
    }

    /*
     * This function generates a name for the clients base64 photo
     */
    public function generateNameforClientPhoto($clientname){
        $rand_numb = md5(uniqid(microtime()));
        $neu_name = $rand_numb.$clientname;
        return $neu_name;
    }
}