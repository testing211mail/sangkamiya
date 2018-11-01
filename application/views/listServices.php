 <script type="text/javascript" src="<?php echo base_url();?>assets/js/t.js">
    </script>
    <script type="text/javascript">
    // Load the Google Transliterate API
    google.load("elements", "1", {
        packages: "transliteration"
    });
    function onLoad() {
        var options = {
            sourceLanguage: google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage: [google.elements.transliteration.LanguageCode.HINDI],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };
        // Create an instance on TransliterationControl with the required
        // options.
        var control =
            new google.elements.transliteration.TransliterationControl(options);
        // Enable transliteration in the textbox with id
        // 'transliterateTextarea'.
        control.makeTransliteratable(["serviceNamemarathi" ,"serviceNamehindi"]);
    }
    google.setOnLoadCallback(onLoad);
    </script>
  <!-- <script type="text/javascript" src="http://www.google.com/jsapi"></script>
  <script type="text/javascript">
  // Load the Google Transliteration API

  google.load("elements", "1", {

        packages: "transliteration"

      });
  function onLoad()
  {
    var options = {

      sourceLanguage: 'en',

      destinationLanguage: ['hi'],

      shortcutKey: 'ctrl+m',

      transliterationEnabled: true

    };
    // Create an instance on TransliterationControl with the required

    var control = new google.elements.transliteration.TransliterationControl(options);
    // Enable transliteration in the textfields with the given ids.
    var ids = [ "serviceNamemarathi" ,"serviceNamehindi"];
    control.makeTransliteratable(ids);
    // Show the transliteration control which can be used to toggle between
    // English and Hindi and also choose other destination language.
    control.showControl('translControl');
  }
  google.setOnLoadCallback(onLoad);

</script> -->


<script>
    $(document).ready(function(){
    $("#submitform").on('submit', function(e){
        e.preventDefault(); // this will prevent the submit
        //alert("yo");
      console.log("in submit");
      $("#loading").show();
         $.ajax({
             url:"<?php echo base_url();?>service/do_upload",
             type:"POST",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
                console.log("submitted successfully");

                $("#loading").hide();
                window.location.href = "<?php echo base_url().'service' ?>";
           }

         });
    //e.preventDefault(); 
    //alert("yo");
 /*   for(key in new FormData(this))
    {
      console.log(key);
    }
    $("#loading").show();
         $.ajax({
             url:"<?php echo base_url();?>service/do_upload",
             type:"POST",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
                console.log("submitted successfully");

                $("#loading").hide();
                window.location.href = "<?php echo base_url().'service' ?>";
           }
         });*/
    });
});
/*$('#submitform').submit(function(e){
  //  $("#submitbtn").on("click", function(){
    console.log("in submit");
    //e.preventDefault(); 
    alert("yo");
    for(key in new FormData(this))
    {
      console.log(key);
    }
    $("#loading").show();
         $.ajax({
             url:"<?php echo base_url();?>service/do_upload",
             type:"POST",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
                console.log("submitted successfully");

                $("#loading").hide();
                window.location.href = "<?php echo base_url().'service' ?>";
           }
         });
    });*/

function getService(category) {
    //console.log(category);

    $("#loading").show();
    console.log(category);
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
                    console.log('('+d.ser_id+',"'+d.service_name+'",\"'+d.iconlink+'\");');
                    scheme.append('<tr> <td>'+parseInt(i+1)+'</td><td>'+d.service_name+','+d.service_mname+','+d.service_hname+'</td> <td align="center"> <img src='+d.iconlink+' alt="ad" height="120" width="170"/></td> <td> <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>service/editService/'+d.ser_id+'"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td> </tr>')
                });
            }
        }
    });

}
</script>

<div class="container col-md-10" align="center">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i> List Services</div>
          <?php echo $this->session->flashdata('alert'); ?>
          <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control card bg-primary text-white" name="category" onchange="getService(this.value)" id="category">
                                <option selected value="-1">select Category</option>
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
                            <th>Image</th>
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
        	<!-- <?php echo form_open_multipart('ajax-image-upload/post');?>  -->
          <form enctype="multipart/form-data" id="submitform"> 
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
            <label>In Marathi : </label>
            <input type="text" class="form-control" name="serviceNamemarathi" id="serviceNamemarathi" placeholder="e.g. बिस्ट्रो, प्लंबर" required>
        </div>
        <div class="form-group">
            <label>In Hindi : </label>
            <input type="text" class="form-control" name="serviceNamehindi" id="serviceNamehindi" placeholder="e.g. बिस्ट्रो, प्लंबर" required>
        </div>
        <div class="form-group">
            <label>Service Icon : </label>
            <input class="btn btn-danger" type="file" name="file" id="file" required>
        </div>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
             <button type="submit" id="submit" name="submit" class="btn btn-danger submitBtn">Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </form>
            
        </div>
        
      </div>
    </div>
  </div>

