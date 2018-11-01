<!-- <style>
    .sctable{
        overflow-y:scroll;
        height:390px;
        display:block;
    }
</style> -->

<div class="container col-md-10" align="center">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i> List Services</div>
          <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control card bg-primary text-white" name="category" onchange="getService(this.value)" id="category">
                                <option selected>select Category</option>
                                <?php
                                if(!empty($result))
                                { ?>
                                    <?php foreach($result as $category) {  ?>
                                   <option value="<?php echo $category['cat_id'];?>"><?php echo $category['cat_name'];?></option>
                                <?php }}else{ ?>
                                    <div class="alert alert-success">
                                      <strong>Oops!</strong> No Categories found on Server.
                                    </div>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addservice"><i class="fa fa-plus fa-lg"></i> Add New Service</button>
                        </div>
                    </div>

                </div>

                <div id="loading" style="display:none;margin: 3%">
                    <img src="<?php echo base_url(); ?>assets/icon/806.gif" style="width: 5%;height: 8%" alt="Loading" />
                </div>

                 <div class="table-responsive content table-full-width">
                    <table id="myTable" class="table table-bordered table-striped table-condensed table-hover">
                        <thead class="bg-danger text-white" align="center">
                        <tr>
                            <th>#</th>
                            <th>Service Name</th>
                            <th><i class="fa fa-lg fa-cog fa-spin"></i></th>
                        </tr>
                        </thead>
                        <tbody id="serviceTable">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<!-- The Modal -->
  <div class="modal fade" id="addservice">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Service</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form  method="post" name="fupForm" id="fupForm">
          <div class="form-group">
            <label>Categories : </label>
            <select class="form-control btn bg-primary text-white" name="category" id="category">
                <option selected>select Category</option>
                <?php
                if(!empty($result))
                { ?>
                    <?php foreach($result as $category) {  ?>
                   <option value="<?php echo $category['cat_id'];?>"><?php echo $category['cat_name'];?></option>
                <?php }}else{ ?>
                    <div class="alert alert-success">
                      <strong>Oops!</strong> No Categories found on Server.
                    </div>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Service Name : </label>
            <input type="text" class="form-control" name="serviceName" id="serviceName" placeholder="e.g. Bistro, Plumber" required>
        </div>
        <div class="form-group">
            <label>Service Icon : </label>
            <input class="btn btn-danger" type="file" name="file" id="file" required>
        </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-danger submitBtn">Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>



<script>
$(document).ready(function() {
/*$('#fupForm').on('submit', function(e) {
    console.log("inside submit form");
        e.preventDefault();
        var inputFile=$('input[name=file]');
        var fileToUpload=inputFile[0].files[0];
        var other_data = $('#fupForm').serializeArray();
        

         var f=new FormData();
       
        f.append('data',other_data);
        f.append('file',fileToUpload);
        console.log(f.values());*/
      
        /*for (var value of f.values()) {
   			console.log(value); 
		}*/
        //console.log(f["data"]);
        //e.preventDefault();

        $('#submit').submit(function(e){
        e.preventDefault(); 
         $.ajax({
             url:'<?php echo base_url(); ?>service/addservice',
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
                  alert(data);
           }
         });
    });  

        /*$.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>service/addservice',
            data: f,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#fupForm')[0].reset();
                    console.log("Success!!");
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
                }else{
                    console.log("error!!");
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });*/
    
    //file type validation
    /*$("#file").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Please select a valid image file (JPEG/JPG/PNG).');
            $("#file").val('');
            return false;
        }
    });*/
});


function getService(category) {
    //console.log(category);
    $("#loading").show();
    var url = "<?php echo base_url();?>service/getServices";
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
                    scheme.append('<tr> <td>'+parseInt(i+1)+'</td><td>'+d.service_name+'</td> <td><button class="btn btn-success btn-sm"> <i class="fa fa-eye" aria-hidden="true"></i> View</button> <button class="btn btn-info btn-sm"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</button> <button class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</button></td> </tr>')
                });
            }
        }
    });
}
</script>