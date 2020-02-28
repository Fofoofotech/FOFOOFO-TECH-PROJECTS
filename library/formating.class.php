<?php
class formatingclass {
    //put your code here
    public function validateEmail($email){
		return preg_match("/^[-+\\.0-9=a-z_]+@([-0-9a-z]+\\.)+([0-9a-z]){2,4}$/i",$email);
	}
	
	public function validateMobileNo($number){
		return preg_match('/^[0]+[0-9]*/', $number);
	}
        
    public function renderTime($select_name,$count,$selected=""){
        echo '<select style="width:40px" type="time" class=" select" name="'.$select_name.'">';
            for($i=0;$i<$count;){
	$force = sprintf('%02u',$i);
        echo '<option value="'.$force.'" '.(($selected == $force)?'selected="selected"':'').'>'.$force.'</option>';
            $i=$i+1;
		}
        echo '</select>';
    }

   public function renderText($input){
    $order   = array("\r\n", "\n", "\r");
    $replace = '<br />';
    return str_replace($order, $replace, $input);

   }

   public function renderTextRev($input){
    $order   = array("\r\n", "\n", "\r");
    $replace = '<br />';
    return str_replace($replace,$order, $input);

   }
}

?>
