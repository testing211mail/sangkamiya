<?php if (!empty($result)) { //print_r($result);
    foreach ($result as $key => $value) { ?>

<div class="bg-info px-5 py-2 my-0">
		<h1 style="margin-left: 2%"><?php echo $value->service_name; ?>'s : Data</h1>

<div class="container-fluid">
	<div class="card border-primary">
              	<div class="card-body">
                <form method="post" enctype="multipart/form-data" id="uploadimage">
                        <!-- <form method="post" action="<?php echo base_url(); ?>service/editService"> -->

                        <blockquote class="blockquote text-danger">
                          <h2 class="mb-0"><u>Service Edit</u></h2>
                        </blockquote>

                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Service Name:</h4>
                            </div>

                   
                            <div class="col-md">
                                <input type="text" name="service_name" id="service_name" value="<?php echo $value->service_name; ?>">
                                  <input type="hidden" name="ser_id" id="ser_id" value="<?php echo $value->ser_id; ?>">
                            </div>
                                <div class="py-2">
                        
                       <!--  <input class="btn btn-danger btn-lg" type="submit"> -->
                      </div>
                        </div>

                          <div class="row">
                            <div class="col-md text-muted">
                                <h4>Service Image:</h4>
                            </div>

                   
                            <div class="col-md">
                                 <img src="<?php echo $value->iconlink; ?>" class="rounded" alt="profile picture" style="max-height: 300px; max-width: 300px;">
                        <input class="btn btn-danger" type="file" name="file" id="file">
                            </div>
                                <div class="py-2">
                        
                       <!--  <input class="btn btn-danger btn-lg" type="submit"> -->
                      </div>
                        </div>

                                 
                  </br>
                    <div style="max-height: 150px" class="row" align="center">
                    	<div class ="col-md">
                       <input class="btn btn-danger btn-lg" type="submit" id="submit" name="submit">
                   </div>
                        </div>
                    </form>
                  
                </div>
            </div>
            <?php }} ?>
	</div>
</div>
</div>

<script type="text/javascript">
    // Load the Google Transliteration API
  google.load("elements", "1", {
        packages: "transliteration"
      });

  function onLoad() {
    var options = {
      sourceLanguage: 'en',
      destinationLanguage: ['mr'],
      shortcutKey: 'ctrl+m',
      transliterationEnabled: true
    };
    // Create an instance on TransliterationControl with the required
    // options.
    var control = new google.elements.transliteration.TransliterationControl(options);
    // Enable transliteration in the textfields with the given ids.
    var ids = ["service_name"];
    control.makeTransliteratable(ids);
    // Show the transliteration control which can be used to toggle between
    // English and Hindi and also choose other destination language.
    control.showControl('translControl');
  }
  google.setOnLoadCallback(onLoad);


  $('#uploadimage').submit(function(e){
    e.preventDefault(); 
    console.log("inside ajax submit");
    $("#loading").show();
         $.ajax({
             url:"<?php echo base_url();?>service/editserviceinfo/<?php echo $this->uri->segment(3); ?>",
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){         
                $("#loading").hide();
                console.log(data);
                window.location.href = "<?php echo base_url().'service' ?>";
           }
         });
    });

  /* $('#uploadimage').submit(function(e){
    e.preventDefault(); 
    console.log("inside ajax submit");
    $("#loading").show();
         $.ajax({
             url:"<?php echo base_url();?>service/editserviceinfo/<?php echo $this->uri->segment(3); ?>",
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
    });*/
</script>
   