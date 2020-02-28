<script>
    var result ;
    var selectedZoness = [] ;
    $(document).ready(function(){
        $('#region').on('change',function(){
            var region = $('#region').val();
            $.ajax({
                type: 'POST',
                url: "public/Agents/manageagent/model/fetchdist.php",
                data: {'region':region},

                success: function (e) {
                    $('#district').html(e);
                    $('#regform').submit();
                },
                error: function (e) {
                    $('#msgx').text(e).show();
                    setTimeout(function () {
                        $("#msgx").hide();
                    }, 5000);
                },
            })
        })
    })




    $(document).ready(function(){
        $('#branch').on('change',function(){
            var branch = $('#branch').val();
            //alert(branch);
            $.ajax({
                type: 'POST',
                url: "public/Drivers/managedrivers/model/fetchcars.php",
                data: {'branch':branch},

                success: function (e) {
                    $('#carstype').html(e);
                    $('#regform').submit();
                },
                error: function (e) {
                    $('#msgx').text(e).show();
                    setTimeout(function () {
                        $("#msgx").hide();
                    }, 5000);
                },
            })
        })
    })



    // function searchZones(value){
    //     var table = '<table class="table table-striped">' ;
    //     table += '<thead><th></th><th>Zone Name</th><th>Zone -  Branch</th></thead><tbody>'
    //     for(var x=0;x<result.length && result.length>0;x++){
    //         if(result[x].ZONE_NAME.toLowerCase().indexOf(value.toLowerCase())!==-1){
    //             table += '<tr>'+
    //                 '<td><input type="checkbox" onchange=selectZone("'+ result[x].ZONE_CODE +'",this.checked) value="'+ result[x].ZONE_CODE +'"></td>'+
    //                 '<td>'+ result[x].ZONE_NAME +'</td>'+
    //                 '<td>'+ result[x].BRANCH_NAME +'</td>'+
    //                 '</tr>' ;
    //         }
    //     }
    //     table += '<tbody></table>' ;
    //
    //     $('#zonetab').html(table);
    // }
    //
    // function selectZone(zoneCode,isChecked){
    //     if(isChecked){
    //         selectedZoness.push(zoneCode) ;
    //     }else{
    //         for(var i=0;i<selectedZoness.length;i++) {
    //             if (zoneCode == selectedZoness[i]) {
    //                 selectedZoness.splice(i,1) ;
    //                 break;
    //             }
    //         }
    //     }
    //     document.getElementById("selectedzones").value = selectedZoness ;
    //     console.log('zones selected',selectedZoness);
    //
    // }
    //
    // $(document).ready(function(){
    //     $('#search').hide();
    //     $('#branch').on('change',function(){
    //         var branch = $('#branch').val();
    //         var compcode=$('#compcode').val();
    //         $('#newcode').val(compcode);
    //         //alert(district);
    //
    //         $.ajax({
    //             type: 'POST',
    //             url: "public/Agents/manageagent/model/fetechzones.php",
    //             data: {'branch':branch,'compcode':compcode},
    //             dataType:'json',
    //             success: function (e) {
    //                 $('#search').show();
    //                 result = e ;
    //                 var table = '<table class="table table-striped">' ;
    //                 table += '<thead><th></th><th>Zone Name</th><th>Zone -  Branch</th></thead><tbody>'
    //                 for(var x=0;x<result.length && result.length>0;x++){
    //                     table += '<tr>'+
    //                         '<td><input type="checkbox" onchange=selectZone("'+ result[x].ZONE_CODE +'",this.checked) value="'+ result[x].ZONE_CODE +'"></td>'+
    //                         '<td>'+ result[x].ZONE_NAME +'</td>'+
    //                         '<td>'+ result[x].BRANCH_NAME +'</td>'+
    //                         '</tr>'
    //                 }
    //                 table += '<tbody></table>' ;
    //                 console.log('result',table) ;
    //
    //                 $('#zonetab').html(table);            },
    //             error: function (e) {
    //                 $('#msgx').text(e).show();
    //                 setTimeout(function () {
    //                     $("#msgx").hide();
    //                 }, 5000);
    //             },
    //         })
    //     })
    // })
    $(document).ready(function(){
        $('#search').hide();
        $('#district').on('change',function(){
            var district = $('#district').val();
            var compcode=$('#compcode').val();
            $('#newcode').val(compcode);
            $('#newdistrict').val(district);
            //alert(district);

            $.ajax({
                type: 'POST',
                url: "public/Agents/manageagent/model/fetechzones.php",
                data: {'district':district,'compcode':compcode},
                dataType:'json',
                success: function (e) {
                    $('#search').show();
                    result = e ;
                    var table = '<table class="table table-striped">' ;
                    table += '<thead><th></th><th>Zone Name</th><th>Zone -  Branch</th></thead><tbody>'
                    for(var x=0;x<result.length && result.length>0;x++){
                        table += '<tr>'+
                            '<td><input type="checkbox" onchange=selectZone("'+ result[x].ZONE_CODE +'",this.checked) value="'+ result[x].ZONE_CODE +'"></td>'+
                            '<td>'+ result[x].ZONE_NAME +'</td>'+
                            '<td>'+ result[x].BRANCH_NAME +'</td>'+
                            '</tr>'
                    }
                    table += '<tbody></table>' ;
                    console.log('result',table) ;

                    $('#zonetab').html(table);            },
                error: function (e) {
                    $('#msgx').text(e).show();
                    setTimeout(function () {
                        $("#msgx").hide();
                    }, 5000);
                },
            })
        })
    })

</script>