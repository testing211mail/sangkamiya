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
             url:"<?php echo base_url();?>videonews/do_upload",
             type:"POST",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
                alert(data);
                console.log("submitted successfully");
                $("#loading").hide();
                window.location.href = "<?php echo base_url().'videonews' ?>";
           }
         });
    });
});
</script>

<div class="container">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i> List Of Video News</div>
          <?php echo $this->session->flashdata('alert'); ?>
          <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addVcontent"><i class="fa fa-plus fa-lg"></i> Add Video News</button>
                        </div>
                    </div>

                </div>

                 <div class="table-responsive content table-full-width">
                    <table id="myTable" class="table table-bordered table-striped table-condensed table-hover">
                        <thead class="bg-danger text-white" align="center">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Menu Name</th>
                            <th>Title</th>
                            <th>Video</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th><i class="fa fa-lg fa-cog fa-spin"></i></th>
                        </tr>
                        </thead>
                        <tbody id="contenttable">

                          <?php 
                          if (!empty($result)) {
                                foreach ($result as $key => $value) { ?>
                                    <tr>

                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value->date; ?></td>
                                        <td><?php echo $value->menu_name; ?></td>
                                        <td><?php echo $value->title; ?></td>
                                        <td align="center"><video width="200" height="200" controls><source src="<?php echo $value->videolink; ?>" type="video/mp4">Your browser does not support the video tag.</video></td>
                                          <td><?php 
                                        if ($value->is_approved) {
                                          echo "Approved";
                                        }else{
                                          echo "Not Approved";
                                        }

                                         ?></td>
                                        <td align="center"> <img src="<?php echo $value->imagelink; ?>" alt="ad" height="120" width="120"/></td>
                                        <?php if ($this->session->userdata('adminlogged_in') =='NULL') {
                                         echo '<td><a href="'.base_url().'videonews/editVideonews/'.$value->item_id.'" class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>'; 
                                        }
                                         ?>      
                                    </tr>
                        </tbody>
                            <?php }}else{ ?>
                                <div class="alert alert-info"><strong>Oops!</strong> No Video to display.</div>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<!-- The Modal -->
<div class="modal fade" id="addVcontent">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Video News</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<!-- <?php echo form_open_multipart('ajax-image-upload/post');?>  -->
          <form enctype="multipart/form-data" id="submitform"> 

            

        <div class="form-group">
           <label for="menu_id">Select Menu : </label>
              <select class="form-control col-md-4" name="menu_id" id="menu_id" required>
                  <option selected>Select Menu</option>
                  <?php
                  if(!empty($menus))
                  { ?>
                      <?php foreach($menus as $menu) {  ?>
                     <option value="<?php echo $menu->menu_id;?>"><?php echo $menu->menu_name;?></option>
                  <?php }}else{ ?>
                      <div class="alert alert-success">
                        <strong>Oops!</strong> No Menus found.
                      </div>
                  <?php } ?>
              </select>
        </div>

        <div class="form-group">
            <label>News Title : </label>
            <input type="text" class="form-control" name="contentTitle" id="contentTitle" placeholder="" required>
        </div>
        <div class="form-group">
            <label>News Video : </label>
            <input class="btn btn-danger" type="file" name="vfile" id="vfile" required>
        </div>

        <div class="form-group">
            <label>News Image : </label>
            <input class="btn btn-danger" type="file" name="ifile" id="ifile" required>
        </div>

        <div class="form-group">
            <label>News Description : </label>
            <textarea class="form-control" name="contentDesc" rows="5" id="contentDesc"></textarea>
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
  google.setOnLoadCallback(onLoad);</script>