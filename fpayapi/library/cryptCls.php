<?php
class cryptCls {
	private $config;

	
	public function __construct(){
		$this->config = new JConfig();
	}//End Function
	 
	public function loginPassword($username,$password){
		$pepper = "$@&&%***XRTF)){987}[]";
		$salt   = $username;
		return  hash("sha256",$pepper.$password.$salt,false);
	}
	
	
	
}//End Class
?>