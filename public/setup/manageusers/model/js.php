
	
<?php  ?>
<script type="text/javascript">
 var hasCompanies = false ;
 function move(){
    // alert('bravooo');
     $('#viewpage').val('save');
     $('#myform').submit();
     //document.myform.submit();
        return
      }


      function showModal(){
        if (!hasCompanies) {
            $('.assignn').hide();
           
         }else{
          
                  $('.assignn').show();
         }
         $("#asyncomp").modal('show')
      }







  

$(document).ready(function(){
  
       //HIDDING AND SHOWIN CHECK BOX
 if ($('.getdis').val()=='all') {
      $('.check').hide();
        
   }else{
    
            $('.check').show();
   }
  



       





         //ON CHANGE FUNCTION FOR DISTRICTSQ

   $('.Commands').on('change',function(){

    // alert('wooow');

var unitcode=$('.Commands').val();

getunits(unitcode);

   // $('.check').show();
    if ($('.getdis').val()=='all') {
      $('.check').hide();
      $('#assign1').hide();
          // alert($('.getdis').val());
   }else{
    
            $('.check').show();
            $('#assign1').show();
            // $('check').show();

   }

    // document.getElementById('view').value='';document.getElementById('viewpage').value='searchitem';document.myform.submit();
     
    });


// var unitcode=$('.getdis').val();

// getunits(unitcode);


           //BUTTON SHOWING AND HIDDING ON CHECKBOX EVENT
 
 $('#assign1').hide();
 $(' input[type="checkbox"]').on('change', function () {
   var count = 0;
               $(' input[type="checkbox"]').each(function(){
                 if($(this).prop('checked')) {
                   count++;
                   return;
                 }
                 
               })
               if(count > 0) {
                 $('#assign1').show();
               }
   else {
      $('#assign1').hide();
   }
         });
//END
        

        //GETTING THE VALUES OF CHECKBOX

     var $selectAll = $('#selectAll'); // main checkbox inside table thead
    var $table = $('.table'); // table selector 
    var $tdCheckbox = $table.find('tbody input:checkbox'); // checboxes inside table body
    var $tdCheckboxChecked = []; // checked checbox arr

    //Select or deselect all checkboxes on main checkbox change
    $selectAll.on('click', function () {
      // alert('bravoo');
        $tdCheckbox.prop('checked', this.checked);
    });

    //Switch main checkbox state to checked when all checkboxes inside tbody tag is checked
    $tdCheckbox.on('change', function(){
        $tdCheckboxChecked = $table.find('tbody input:checkbox:checked');//Collect all checked checkboxes from tbody tag
    //if length of already checked checkboxes inside tbody tag is the same as all tbody checkboxes length, then set property of main checkbox to "true", else set to "false"
        $selectAll.prop('checked', ($tdCheckboxChecked.length == $tdCheckbox.length));

       //END

        
    })
            

            //  GETTING THE ARM OF SERVICE INPUTS 


$('#arm').on('change',function(){

    // alert('JESUS IS LORD');
var armvibes=$('#arm').val();
    if (armvibes =='Army') {

     $('#army').show();
     $('#navy').hide();
      $('#airforce').hide();

     }

    if (armvibes =='Airforce') {

     $('#airforce').show();
     $('#army').hide();
     $('#navy').hide();
   
     }

      if (armvibes =='Civilian') {

     $('#airforce').hide();
     $('#army').hide();
     $('#navy').hide();
     
     }

      if (armvibes =='Navy') {
       
        $('#navy').show();
        $('#army').hide();
        $('#airforce').hide();
       

    }else{
    
           return false;

   }

    
     
    });






  });//DOCUMENT READY ENDS
 






//get companies
 function getunits(unitcode){
    $.ajax({
                method:'POST',
                url:'public/setup/manageusers/model/fetch.php',
                data:{'unitcode':unitcode},
                success: function(response){
                  if(!response){
                    $("#unit").html('<option value ="">--No Company--</option>')
                    return
                  }
                  hasCompanies = true ;
               $('#unit').html(response);

                }
            });
}





</script>














