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
        control.makeTransliteratable(["MemmName" ,"MemhName","BusinessmName","BusinesshName","BusinessmAdd","BusinesshAdd","sandpm","sandph"]);
    }
    google.setOnLoadCallback(onLoad);
    </script>

<!-- <script type="text/javascript" src="http://www.google.com/jsapi"></script>
  <script type="text/javascript">
  // Load the Google Transliteration API

  google.load("elements", "1", {

        packages: "transliteration"

      });
  function onLoad() {

    var options = {

      sourceLanguage: 'en',

      destinationLanguage: ['hi'],

      shortcutKey: 'ctrl+m',

      transliterationEnabled: true

    };
    // Create an instance on TransliterationControl with the required

    var control = new google.elements.transliteration.TransliterationControl(options);
    // Enable transliteration in the textfields with the given ids.
    var ids = [ "MemmName" ,"MemhName","BusinessmName","BusinesshName","BusinessmAdd","BusinesshAdd","sandpm","sandph"];
    control.makeTransliteratable(ids);
    // Show the transliteration control which can be used to toggle between
    // English and Hindi and also choose other destination language.
    control.showControl('translControl');
  }
  google.setOnLoadCallback(onLoad);

</script> -->

<div class="contain-fluid" align="center">
  <div class="col-md-12">
    <div class="card border-primary">
      <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i>Make Member</div>
      <div class="card-body">
      <!--   <?php print_r($info);?> -->
        <form enctype="multipart/form-data" id="submit">
         <!--  <legend>Membership Form</legend> -->
          <small class="text-danger">* fields are mandatory!</small>

          <div id="loading" style="display:none;margin: 3%">
            <img src="<?php echo base_url(); ?>assets/icon/806.gif" style="width: 5%;height: 8%" alt="Loading" />
          </div>

          <div class="row">
            <blockquote class="blockquote col-md-12 text-danger">
              <h2 class="mb-0"><u>General Information</u></h2>
            </blockquote>

            <div class="form-group col-md-6">
              <label for="category">*Select Category : </label>
              <select class="form-control" name="category" onchange="getService(this.value)" id="category" required>
                  <option value="">select Category</option>
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
              <label for="contact">*Contact Number : </label>
              <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter Contact Number" max="10" value="<?php echo $info[0]->mobile_no?>" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="landline">Landline Number : </label>
              <input type="text" class="form-control" name="landline" id="landline" placeholder="Enter Landline Number" value="<?php echo $info[0]->landline_no?>">
            </div>

            <div class="form-group col-md-6">
              <label for="aadhar">Aadhar Number : </label>
              <input type="text" class="form-control" name="aadhar" id="aadhar" placeholder="Enter Aadhar Number" value="<?php echo $info[0]->aadhar_no?>">
            </div>

            <div class="form-group col-md-6">
              <label for="bgroup">Blood Group : </label>
              <input type="text" class="form-control" name="bgroup" id="bgroup" placeholder="Enter Blood Group" value="<?php echo $info[0]->blood_group?>">
            </div>

            <div class="form-group col-md-6">
              <label for="email">Email Id : </label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email ID" value="<?php echo $info[0]->email_id?>">
            </div>

            <div class="form-group col-md-6">
              <label for="website">Website : </label>
              <input type="text" class="form-control" name="website" id="website" placeholder="Enter Website Address" value="<?php echo $info[0]->website?>">
            </div>

            <div class="form-group col-md-6">
              <label for="youtube">Youtube : </label>
              <input type="text" class="form-control" name="youtube" id="youtube" placeholder="Enter youtube Address">
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
              <label for="membershipfee">*Membership Fee : </label>
              <input type="text" class="form-control" name="membershipfee" aria-describedby="memfee" id="membershipfee" placeholder="Enter Amount of yearly fees" required="">
              <small id="memfee" class="form-text text-muted">This Subscription Fees are only valid for 1 Year.</small>
            </div>

            <div class="form-group col-md-6">
              <label for="file">Business Logo/Image : </label>
              <input class="btn btn-dark" type="file" name="file" id="file" required>
            </div>

            <blockquote class="blockquote col-md-12 text-danger">
              <h2 class="mb-0"><u>Personal Information</u></h2>
            </blockquote>

            <div class="form-group col-md-6">
              <label for="MemName">*Member Name : </label>
              <input type="text" class="form-control" name="MemName" id="MemName" placeholder="Enter Member Name" value="<?php echo $info[0]->mem_name?>" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="BusinessName">*Business Name : </label>
              <input type="text" class="form-control" name="BusinessName" id="BusinessName" placeholder="Enter Business Name" value="<?php echo $info[0]->business_name?>" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="BusinessAdd">*Business Address : </label>
              <input type="text" class="form-control" name="BusinessAdd" id="BusinessAdd" placeholder="Enter Business Address" value="<?php echo $info[0]->address?>" required="">
            </div>


            <div class="form-group col-md-6">
              <label for="sandp">Service & Product Details : </label>
              <input type="text" class="form-control" name="sandp" id="sandp" value="<?php echo $info[0]->s_p_info?>" placeholder="Enter Product Details">
            </div>

            <blockquote class="blockquote col-md-12 text-danger">
              <h2 class="mb-0"><u>वैयक्तिक माहिती</u></h2>
            </blockquote>

            <div class="form-group col-md-6">
              <label for="MemName">*Member Name : </label>
              <input type="text" class="form-control" name="MemmName" id="MemmName" placeholder="Enter Member Name" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="BusinessName">*Business Name : </label>
              <input type="text" class="form-control" name="BusinessmName" id="BusinessmName" placeholder="Enter Business Name" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="BusinessAdd">*Business Address : </label>
              <input type="text" class="form-control" name="BusinessmAdd" id="BusinessmAdd" placeholder="Enter Business Address" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="sandp">Service & Product Details : </label>
              <input type="text" class="form-control" name="sandpm" id="sandpm" placeholder="Enter Product Details">
            </div>

            <blockquote class="blockquote col-md-12 text-danger">
              <h2 class="mb-0"><u>निजी जानकारी</u></h2>
            </blockquote>

            <div class="form-group col-md-6">
              <label for="MemName">*Member Name : </label>
              <input type="text" class="form-control" name="MemhName" id="MemhName" placeholder="Enter Member Name" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="BusinessName">*Business Name : </label>
              <input type="text" class="form-control" name="BusinesshName" id="BusinesshName" placeholder="Enter Business Name" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="BusinessAdd">*Business Address : </label>
              <input type="text" class="form-control" name="BusinesshAdd" id="BusinesshAdd" placeholder="Enter Business Address" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="sandp">Service & Product Details : </label>
              <input type="text" class="form-control" name="sandph" id="sandph" placeholder="Enter Product Details">
            </div>
             <input type="hidden" class="form-control" name="reg_id" id="reg_id"  value="<?php echo $info[0]->reg_id?>" required="">

            
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
             url:"<?php echo base_url();?>Registration/do_upload",
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
              success: function(data){
               
                $("#loading").hide();
                window.location.href = "<?php echo base_url().'Registration' ?>";
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