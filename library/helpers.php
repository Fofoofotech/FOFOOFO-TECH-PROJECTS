<?php


function ch_array_where(array $aray,$column,$equals){
	foreach ($array as $key => $value) {
		if($value["$column"] == $equals){
			return $value;
		}
		# code...
	}
}