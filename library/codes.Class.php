<?php
class codesClass extends engineClass{
	

	function __construct(){
	 parent::__construct();	
	}
	

    public function getProjectCode($winyear){
	$items = $winyear.'-';
	$stmt = $this->sql->Execute($this->sql->Prepare("SELECT PRJ_CODE FROM cf_project ORDER BY PRJ_CODE DESC LIMIT 1"));
	print $this->sql->ErrorMsg();
	if($stmt->RecordCount() > 0){
		$obj = $stmt->FetchNextObject();
		$order = substr($obj->PRJ_CODE, 5, 100);
		$order = $order + 1;
		if(strlen($order) == 1){
			$orderno = $items.'00000'.$order;
		}else if(strlen($order) == 2){
			$orderno = $items.'00000'.$order;
		}else if(strlen($order) == 3){
			$orderno = $items.'0000'.$order;
		}else if(strlen($order) == 4){
			$orderno = $items.'000'.$order;
		}else if(strlen($order) == 5){
			$orderno = $items.'00'.$order;
		}else if(strlen($order) == 6){
			$orderno = $items.'00'.$order;
		}else if(strlen($order) == 7){
			$orderno = $items.'0'.$order;
		}else{
			$orderno = $items.$order;
		}
	}else{
		$orderno = $items.'000001';
	}
	return $orderno;
}
public function genericCodeGeneratorbis($table, $prefix, $code_column,$number_of_digits = 3){
	$code_column = strtoupper($code_column);
//        $no_prec = 10;#Maximum number of preceding Zeros;
	$no_prec = $number_of_digits;#Maximum number of preceding Zeros;
	$pref_len = strlen($prefix);
	$pref_len_m = $pref_len+1;
	$surplus = $no_prec - $pref_len;
	$stmt = $this->sql->Execute($this->sql->Prepare("SELECT  MAX(CAST( SUBSTRING({$code_column} FROM {$pref_len_m}) AS UNSIGNED)) AS {$code_column}  FROM {$table} WHERE {$code_column} LIKE '{$prefix}%'  LIMIT 1"));
	print $this->sql->ErrorMsg();
	if($stmt->RecordCount() > 0){
		$obj = $stmt->FetchNextObject();
		$prev_code = $obj->$code_column ? $obj->$code_column : 0 ;
		$next_code = $prev_code + 1;
//            die(var_dump([$prev_code,$prefix]));
		$multiplier = $no_prec - strlen($next_code);
		$multiplier = $multiplier <= 0 ? 0 : $multiplier ;
		$code = str_repeat("0",$multiplier) . $next_code;
	}else{
		$code = str_repeat("0",$no_prec) . 1;
	}
	$final = $prefix.$code;
	#check if code already exists
	$stmt = $this->sql->Execute($this->sql->Prepare("SELECT {$code_column}  FROM {$table} WHERE {$code_column}={$this->sql->Param('a')} LIMIT 1"),[$final]);
	if($stmt->RecordCount()>0){
		return  $this->genericCodeGeneratorbis($table, $prefix, $code_column);
	}
	return $final ;
}
   
    
}
?>