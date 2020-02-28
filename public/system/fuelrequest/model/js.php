
	

<script type="text/javascript">


            //GET UNITS AND DEPARTMENTS
 function getunits(unitcode){
    $.ajax({
                method:'POST',
                url:'public/setup/managedrivers/model/fetch.php',
                data:{'unitcode':unitcode},
                success: function(response){
                  if(!response){
                    $("#unit").html('<option >--No Unit available--</option>')
                    return
                  }
                  hasCompanies = true ;
               $('#unit').html(response);

                }
            })


     $.ajax({
                method:'POST',
                url:'public/setup/managedrivers/model/fetchdepartment.php',
                data:{'unitcode':unitcode},
                success: function(response){
                  if(!response){
                    $("#office").html('<option >--No Department(s) available--</option>')
                    return
                  }
                  hasCompanies = true ;
               $('#office').html(response);

                }
            });
}


function clicktoPrint(){
  try{
    if (CheckIsIE() == true){
    iframe = document.getElementById('printframe');
        iframe.contentWindow.document.execCommand('print', false, null);
    }else{
      window.printframe.focus();
                window.printframe.print();
          }
            }catch(e){
        window.printframe.focus();
                window.printframe.print();
            }
  }  


  // $('#nextinfo').on('click',function(){ 
    function requestdetails(driver,vehicle){
      // alert('request details hiting now');
    $.ajax({
                method:'POST',
                dataType:'html',
                url:'public/system/fuelrequest/model/fetchdepartment.php',
                data:{'driver':driver,'vehicle':vehicle},
                success: function(response){
                  $('#fueldetails').html(response);
                 return;
                  
                }
            });
    }


</script>














