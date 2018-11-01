<?php if (!empty($result)) { //print_r($result);
    foreach ($result as $key => $value) { ?>

<div class="bg-info px-5 py-2 my-0">
		<h1 style="margin-left: 2%"><?php echo $value->service_name; ?>'s : Data</h1>

<div class="container-fluid">
	<div class="card border-primary">
        <!-- <div class="card-header bg-primary text-white"> <i class="fa fa-user"></i> Profile</div> -->
          	<div class="card-body">
                <div class="row">
                	<div class="col-md-4">
                		<form method="post" enctype="multipart/form-data" id="uploadimage">
	                		<div class="border-danger">
	                			<img src="<?php echo $value->iconlink; ?>" class="rounded" alt="profile picture" style="max-height: 300px; max-width: 300px;">
	                		</div>
	                		<div class="py-2">
	                			<input class="btn btn-danger" type="file" name="file" id="file">
	                			<input class="btn btn-danger btn-lg" type="submit">
	                		</div>
                		</form>
                	</div>
                	<div class="col-md-6">

                        <div id="loading" style="display:none;margin: 3%">
                            <img src="<?php echo base_url(); ?>assets/icon/806.gif" style="width: 5%;height: 8%" alt="Loading" />
                        </div>

                        <form method="post" action="<?php echo base_url(); ?>service/editService">

                        <blockquote class="blockquote text-danger">
                          <h2 class="mb-0"><u>Service Edit</u></h2>
                        </blockquote>

                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Service Name:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="service_name" id="service_name" value="<?php echo $value->service_name; ?>">
                            </div>
                        </div>
                	</div>
                    <div style="max-height: 150px" class="col-md-2" align="center">
                        <div class="card border-primary">
                            <div class="card-header bg-danger text-white"> <i class="fa fa-cog fa-spin"></i>  Actions</div>
                            <div class="card-body">
                                <div class="col-md">
                                	<input type="hidden" name="ser_id" value="<?php echo $value->ser_id; ?>">
                                    <button class="btn btn-success" type="submit"> Update</button>
                                    <br><br>
                                    <button class="btn btn-danger" type="btn" name="cancel"> Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <?php }} ?>
	</div>
</div>
</div>


<script type="text/javascript">
    $('#uploadimage').submit(function(e){
  /*var f = new FormData(this); 
  console.log(f);
  for(key in f)
  {
    console.log(key);
  }*/
  console.log("inside ajax submit");
    e.preventDefault(); 
    $("#loading").show();
         $.ajax({
             url:"<?php echo base_url();?>service/editserviceimage/<?php echo $this->uri->segment(3); ?>",
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
               
                $("#loading").hide();
                window.location.href = "<?php echo base_url().'service' ?>";
           }
         });
    });
</script>