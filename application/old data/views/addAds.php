<div class="contain-fluid" align="center">
  <div class="col-md-12">
    <div class="card border-primary">
      <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i> Add Member Advertise</div>
      <div class="card-body">
        <form enctype="multipart/form-data" id="submit">
          <legend>Add Advertise for member</legend>
          <small class="text-danger">* fields are mandatory!</small>
          <div class="row">
            <!-- <?php print_r($result); ?> -->
            <div class="form-group col-md-12">
              <label for="category">*Select Member Name : </label>
              <select class="form-control" name="member" id="member">
                  <option selected>Select Member</option>
                  <?php
                  if(!empty($result))
                  { ?>
                      <?php foreach($result as $mem) {  ?>
                     <option value="<?php echo $mem->mem_id;?>"><?php echo $mem->mem_name;?></option>
                  <?php }}else{ ?>
                      <div class="alert alert-success">
                        <strong>Oops!</strong> No Members found on Server.
                      </div>
                  <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-10">
              <label for="file">Advertise Image : </label>
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
             url:"<?php echo base_url();?>ads/do_upload",
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
               
                $("#loading").hide();
                window.location.href = "<?php echo base_url().'ads' ?>";
           }
         });
    });
</script>