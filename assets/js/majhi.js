
$('#submit').submit(function(e){
    e.preventDefault(); 
    for(key in new FormData(this))
    {
      console.log(key);
    }
    $("#loading").show();
         $.ajax({
             url:"http://sangkamya.com/service/do_upload",
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){

              	$("#loading").hide();
               	window.location.href = "http://sangkamya.com/service";
           }
         });
    });

function getService(category) {
    //console.log(category);
    $("#loading").show();
    var url = "http://sangkamya.com/service/getServices";
    var scheme = $('#serviceTable');
    $.ajax({
        type: 'POST',
        data: {"category":category},
        url: url,
        success: function(data) {
            $("#loading").hide();
            scheme.empty();
            //$("#myTable div.alert").empty();
            if (data) {
                var opts = $.parseJSON(data);
               
                //console.log(data);
                $.each(opts, function(i, d) {

                   var servicename = d.service_name.toString();
                   console.log(servicename);

                    scheme.append('<tr> <td>'+parseInt(i+1)+'</td><td>'+d.service_name+'</td> <td align="center"> <img src='+d.iconlink+' alt="ad" height="120" width="170"/></td> <td> <button class="btn btn-info btn-sm" onclick="showedit("'+servicename +'")"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></td> </tr>');
                });
            }
        }
    });
}

function showedit(name)
{
  console.log(name.toString());
/*
  console.log(name.toString());

  $('#editmodal').modal({
          backdrop: 'static',
          keyboard: true
     });*/
/*    var data='<div class="modal-footer"><button type="button" class="btn btn-danger" onclick="editService('+id+');" > Yes</button>  <button type="button" class="btn btn-info" data-dismiss="modal"> No</button></div>';
  $('#deleteadmodal .modal-body').html(data);*/
  //$('#deleteadmodal').modal('show');
}



