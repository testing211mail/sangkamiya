
<script>
    $(document).ready(function(){
    $("#submitform").on('submit', function(e){
        e.preventDefault(); // this will prevent the submit
        //alert("yo");
      console.log("in submit");
    //e.preventDefault(); 
    //alert("yo");
    for(key in new FormData(this))
    {
      console.log(key);
    }
    $("#loading").show();
         $.ajax({
             url:"<?php echo base_url();?>categories/do_upload",
             type:"POST",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
                console.log("submitted successfully");

                $("#loading").hide();
                window.location.href = "<?php echo base_url().'categories' ?>";
           }
         });
    });
});
</script>

<div class="container col-md-10" align="center">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i> List Categories</div>
          <?php echo $this->session->flashdata('alert'); ?>
          <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addcategory"><i class="fa fa-plus fa-lg"></i> Add New Category</button>
                        </div>
                    </div>

                </div>

                 <div class="table-responsive content table-full-width">
                    <table id="myTable" class="table table-bordered table-striped table-condensed table-hover">
                        <thead class="bg-danger text-white" align="center">
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th><i class="fa fa-lg fa-cog fa-spin"></i></th>
                        </tr>
                        </thead>
                        <tbody id="categorytable">

                          <?php if (!empty($result)) {
                                foreach ($result as $key => $value) { ?>
                                    <tr>

                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value['cat_name']; ?></td>
                                        <td align="center"> <img src=<?php echo $value['imagelink']; ?> alt="ad" height="120" width="170"/></td>                                       
                                        <td align="center"><a href="<?php echo base_url(); ?>categories/editCategory/<?php echo $value['cat_id'] ;?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a onclick="return confirm('Are You Sure.....You Want To Delete ?')" href="<?php echo base_url(); ?>categories/deleteCategory/<?php echo $value['cat_id'] ;?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                        </tbody>
                            <?php }}else{ ?>
                                <div class="alert alert-info"><strong>Oops!</strong> No Category to display.</div>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<!-- The Modal -->
<div class="modal fade" id="addcategory">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<!-- <?php echo form_open_multipart('ajax-image-upload/post');?>  -->
          <form enctype="multipart/form-data" id="submitform"> 
         
            
        <div class="form-group">
            <label>Category Name : </label>
            <input type="text" class="form-control" name="categoryName" id="categoryName" placeholder="e.g. Food, Shops" required>
        </div>
        <div class="form-group">
            <label>Category Icon : </label>
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
    var ids = ["categoryName"];
    control.makeTransliteratable(ids);
    // Show the transliteration control which can be used to toggle between
    // English and Hindi and also choose other destination language.
    control.showControl('translControl');
  }
  google.setOnLoadCallback(onLoad);
  </script>