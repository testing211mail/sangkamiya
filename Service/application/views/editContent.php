  <div class="container">

  


<div class="card border-primary">
        <div class="card-header bg-secondary">

          <div class="row">

              <div class="col">
                <?php 
            if ($content->is_approved == 0) {
                echo '<form method="post" action="'.base_url().'contents/approveContent/'.$content->item_id.'">
                <button class="btn btn-success" type="submit" name="submit"> Approve</button>
            </form>';
            }
            else{
                echo '<form method="post" action="'.base_url().'contents/disapproveContent/'.$content->item_id.'">
                <button class="btn btn-danger" type="submit" name="submit"> Dis-Approve</button>
            </form>';
            } ?>
              </div>

              <div class="col">
                <h3 class="text-center"><?php echo $content->menu_name; ?></h3>
              </div>

              <div class="col text-right">
                <form method="post" action="<?php echo base_url().'contents/deleteContent/'.$content->item_id; ?>">
                <button onclick="return confirm('Are You Sure.....You Want To Delete ?')" class="btn btn-danger" type="submit" name="submit" > Delete</button>
            </form>
              </div>
              
            </div>

            
        </div>
          <div class="card-body">
            

  <div class="row pb-3">
    <div class="col">
        <form action="<?php echo base_url().'contents/savecontent' ?>" method="POST">

    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="date">Date :</label>
          <input type="text" id="datepicker" class="form-control" name="date" value="<?php echo $content->date; ?>">
        </div>
      </div>
      <div class="col">

          </div>
        </div>



        <div class="form-group">
          <label>Content Title : </label>
          <input type="text" class="form-control" name="contentTitle" id="contentTitle" value="<?php echo $content->title; ?>" required>
        </div>

        <div class="form-group">
          <label>Content Description : </label>
          <textarea class="form-control" name="contentDesc" rows="5" id="contentDesc"><?php echo $content->description; ?></textarea>
        </div>
        <input type="hidden" name="item_id" value="<?php echo $content->item_id; ?>">
        <div align="center"> <button type="submit" class="btn btn-primary">Save</button></div>

      </form>
    </div>

    <div class="col">
      <label for="imagelink">Edit Image :</label>
      <form method="post" enctype="multipart/form-data" id="uploadimage">
        <div class="border-danger">
          <img src="<?php echo $content->imagelink; ?>" alt="profile picture" style="max-height: 400px; max-width: 400px;">
        </div>
        <div class="py-2">
          <input class="btn btn-danger" type="file" name="file" id="file">
          <input class="btn btn-danger btn-lg" type="submit" name="submit">
        </div>
      </form>
    </div>
  </div>
<hr>

</div>
</div>

</div>


  <script>

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
    var ids = ["contentTitle","contentDesc"];
    control.makeTransliteratable(ids);
    // Show the transliteration control which can be used to toggle between
    // English and Hindi and also choose other destination language.
    control.showControl('translControl');
  }
  google.setOnLoadCallback(onLoad);


  $( function() {
    $( "#datepicker" ).datepicker({
     dateFormat: "dd-mm-yy"
    });
  } );


$('#uploadimage').submit(function(e){
    e.preventDefault(); 
    $("#loading").show();
         $.ajax({
             url:"<?php echo base_url();?>contents/editcontentimage/<?php echo $this->uri->segment(3); ?>",
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
                $("#loading").hide();
                window.location.href = "<?php echo base_url().'contents' ?>";
           }
         });
    });

  </script>