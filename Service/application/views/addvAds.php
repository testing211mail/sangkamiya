<div class="contain-fluid" align="center">
  <div class="col-md-12">
    <div class="card border-primary">
      <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i> Add Video Advertise</div>
      <div class="card-body">
        <form enctype="multipart/form-data" id="submit">
          <small class="text-danger">* fields are mandatory!</small>
          <div class="row">
            <div class="form-group col-md-10">
              <label for="file">Advertise Video : </label>
              <input class="btn btn-dark" type="file" name="file" id="file" required>
            </div>

            <div class="col-md-12">
              <button type="submit" id ="sub" name="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

$('#submit').submit(function(e){
  console.log("inside ajax submit");
    e.preventDefault(); 
    $("#loading").show();
         $.ajax({
             url:"<?php echo base_url();?>videoads/do_upload",
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){

               
                $("#loading").hide();
                alert(data);
              // window.location.href = "<?php echo base_url().'videoads' ?>";
           }
         });
    });
</script>