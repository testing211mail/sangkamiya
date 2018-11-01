<div class="contain-fluid" align="center">
  <div class="col-md-12">
    <div class="card border-primary">
      <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i> Add New Member</div>
      <div class="card-body">
        <form enctype="multipart/form-data" id="submit">
          <legend>Membership Form</legend>
          <small class="text-danger">* fields are mandatory!</small>

          <div id="loading" style="display:none;margin: 3%">
            <img src="<?php echo base_url(); ?>assets/icon/806.gif" style="width: 5%;height: 8%" alt="Loading" />
          </div>

          <div class="row">

            <div class="form-group col-md-6">
              <label for="category">*Select Category : </label>
              <select class="form-control" name="category" onchange="getService(this.value)" id="category">
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

            <div class="form-group col-md-6">
              <label for="service">*Select Service : </label>
              <select class="form-control" id="service" name="service">
                <option>--select category first--</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="MemName">*Member Name : </label>
              <input type="text" class="form-control" name="MemName" id="MemName" placeholder="Enter Member Name" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="BusinessName">*Business Name : </label>
              <input type="text" class="form-control" name="BusinessName" id="BusinessName" placeholder="Enter Business Name" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="BusinessAdd">*Business Address : </label>
              <input type="text" class="form-control" name="BusinessAdd" id="BusinessAdd" placeholder="Enter Business Address" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="lat">*Latitude : </label>
              <input type="text" class="form-control" name="lat" id="lat" placeholder="Enter Latitude" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="log">*Longitude : </label>
              <input type="text" class="form-control" name="log" id="log" placeholder="Enter Longitude" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="contact">*Contact Number : </label>
              <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter Contact Number" max="10" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="landline">Landline Number : </label>
              <input type="text" class="form-control" name="landline" id="landline" placeholder="Enter Landline Number">
            </div>

            <div class="form-group col-md-6">
              <label for="aadhar">*Aadhar Number : </label>
              <input type="text" class="form-control" name="aadhar" id="aadhar" placeholder="Enter Aadhar Number" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="bgroup">Blood Group : </label>
              <input type="text" class="form-control" name="bgroup" id="bgroup" placeholder="Enter Blood Group">
            </div>

            <div class="form-group col-md-6">
              <label for="email">Email Id : </label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email ID">
            </div>

            <div class="form-group col-md-6">
              <label for="sandp">Service & Product Details : </label>
              <input type="text" class="form-control" name="sandp" id="sandp" placeholder="Enter Product Details">
            </div>

            <div class="form-group col-md-6">
              <label for="membershipfee">*Membership Fee : </label>
              <input type="text" class="form-control" name="membershipfee" aria-describedby="memfee" id="membershipfee" placeholder="Enter Amount of yearly fees" required="">
              <small id="memfee" class="form-text text-muted">This Subscription Fees are only valid for 1 Year.</small>
            </div>

            <div class="form-group col-md-6">
              <label for="file">Business Logo/Image : </label>
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
             url:"<?php echo base_url();?>members/do_upload",
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
               
                $("#loading").hide();
                window.location.href = "<?php echo base_url().'members' ?>";
           }
         });
    });


  function getService(category) {
    //console.log(category);
    $("#loading").show();
    var url = "<?php echo base_url();?>service/getServices";
    var scheme = $('#service');
    $.ajax({
        type: 'POST',
        data: {"category":category},
        url: url,
        success: function(data) {
            $("#loading").hide();
            scheme.empty();
            if (data) {
                var opts = $.parseJSON(data);
                //console.log(data);
                $.each(opts, function(i, d) {
                    scheme.append('<option value="'+d.ser_id+'">'+d.service_name+'</option>')
                });
            }
        }
    });
}
</script>