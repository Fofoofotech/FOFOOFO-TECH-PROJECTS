<?php
/*
 * This class is designed to upload documents from the consumer reference system
 * Author: Ake 
 */
class upload extends engineClass{
	   
	   function __construct(){
		   parent::__construct();
		   }
		   


 public function uploadAttachement($file,$type=""){

    if(is_uploaded_file($file['tmp_name']) && $file['error'] == 0){
        $ext = array('image/pjpeg','image/jpeg','image/jpg','image/png','image/x-png','image/gif');
        $rand_numb = md5(uniqid(microtime()));
        $neu_name = $rand_numb.$file['name'];
        $_name_ = $file['name'];
        $_type_ = $file['type'];
        $_tmp_name_ = $file['tmp_name'];
        $_size_ = $file['size'] / 1024;
        if(in_array($_type_,$ext)){
	
	    if($type == 'logo'){$neu_name2 = 'cmplogo/'.$neu_name ; }
    if(@move_uploaded_file($_tmp_name_,SHOST_IMAGES.$neu_name2))
	{
		return $neu_name;
		
            }else{
                return false;
            }
        }else{
            return false;
        }
            }else{
                return false;
            }
    }//end

    public function uploadAfile($file,$neu_name="-1", $target_dir='/', $size="-1"){
        $format_types = array("image/pjpeg", 'image/jpeg', 'image/jpg', 'image/png', 'image/x-png', 'image/pmb' , 'image/ico');
        $uploadit = $uploadpass_size = $uploadpass_type = true;
        $upload_time = time();// GET THE UPLOAD TIME
        $neu_name = ($neu_name == "-1")?$upload_time."_".basename($_FILES[$file]["name"]):$neu_name;
        $target_file = $target_dir.DS.$neu_name;
        //check file exits
        if(!file_exists($target_file)){
            $uploadit = true;
        }else{
            //$uploadit = false;
        }

        //check file size
        if($size != "-1" && $_FILES[$file]["size"] > $size){
            $uploadpass_size = false;
        }

        //check format
        if(!in_array($_FILES[$file]["type"], $format_types)){
            $uploadpass_type = false;
        }
        if($uploadit && $uploadpass_size && $uploadpass_type){

            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            if(move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)){
                return $neu_name;
            }else{
                return $_FILES[file]["error"];
            }
        }else{
            return false;
        }
    }







    public function uploadimage($file,$target_dir,$neu_name="-1",$size="-1"){
    $format_types = array('image/pjpeg','image/jpeg','image/jpg','image/png','image/x-png','image/gif');
    $uploadit = $uploadpass_size = $uploadpass_type = true;
    //$target_dir = CLIENTPICTURE;
    $neu_name = ($neu_name == "-1")?basename($_FILES[$file]["name"]):$neu_name;
    //$target_file = $target_dir.DS.$neu_name;
    
    $ext = explode('.', $neu_name);//explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
            $filename= md5($_FILES['picturename']['name']) . date("his")."." . $ext[1];
            //$target_file = $target_dir.DS.$neu_name;
            $target_file = $target_dir.DS.$filename;
            
    //check file exits
    
    if (!file_exists($target_file)) {
        $uploadit = true;
    } else {        
        //$uploadit = false;
    }
    
    //check file size   
    if ($size != "-1" && $_FILES[$file]["size"] > $size) {
            $uploadpass_size = false;
        }
    
    //check format  
    if(!in_array($_FILES[$file]["type"],$format_types)){
        $uploadpass_type = false;
    }
    if($uploadit && $uploadpass_size && $uploadpass_type){
         
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) {
    
        return $filename;
    } else {
        return $_FILES[file]["error"];
    }
    }else{
        return false;
    }
}

	
}
?>