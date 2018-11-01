<?php if (!empty($result)) { //print_r($result);
    foreach ($result as $key => $value) { ?>

<div class="bg-info px-5 py-2 my-0">
		<h1 style="margin-left: 2%"><?php echo $value->cat_name; ?>'s : Data</h1>

<div class="container-fluid">
	<div class="card border-primary">
          	<div class="card-body">
              
                	<div>
                		<form method="post" enctype="multipart/form-data" id="uploadimage">
                     
                      <div class="col-md-4">
                        <label>Category Name : </label>
                                <input type="text" name="cat_name" id="cat_name" value="<?php echo $value->cat_name; ?>">
                            </div>

	                		<div class="border-danger col-md-4">
                         <label>Category Image : </label>
	                			<img src="<?php echo $value->imagelink; ?>" class="rounded" alt="profile picture" style="max-height: 300px; max-width: 300px;">
	                		</div>
	                		<div class="py-2">
	                			<input class="btn btn-danger" type="file" name="file" id="file">
	                			<input class="btn btn-danger btn-lg" type="submit">
	                		</div>
                    
                		</form>
                	</div>
                	<div>                 
                </div>
            </div>
            <?php }} ?>
	</div>
</div>
</div>


<script type="text/javascript">


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
    var ids = ["cat_name"];
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
             url:"<?php echo base_url();?>categories/editserviceimage/<?php echo $this->uri->segment(3); ?>",
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){         
                $("#loading").hide();
                window.location.href = "<?php echo base_url().'categories' ?>";
           }
         });
    });
</script>