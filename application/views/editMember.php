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
        control.makeTransliteratable(["mem_mname" ,"mem_hname","business_mname","business_hname","s_p_minfo","s_p_hinfo","maddress","haddress"]);
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
    var ids = [ "mem_mname" ,"mem_hname","business_mname","business_hname","s_p_minfo","s_p_hinfo","maddress","haddress"];
    control.makeTransliteratable(ids);
    // Show the transliteration control which can be used to toggle between
    // English and Hindi and also choose other destination language.
    control.showControl('translControl');
  }
  google.setOnLoadCallback(onLoad);

</script> -->

<?php if (!empty($result)) {
    foreach ($result as $key => $value) { ?>

<div class="bg-info px-5 py-2 my-0">
		<h1 style="margin-left: 2%"><?php echo $value->mem_name; ?>'s : Profile</h1>

<div class="container-fluid">
	<div class="card border-primary">
        <!-- <div class="card-header bg-primary text-white"> <i class="fa fa-user"></i> Profile</div> -->
          	<div class="card-body">
                <div class="row">
                	<div class="col-md-4">
                		<form method="post" enctype="multipart/form-data" id="uploadimage">
	                		<div class="border-danger">
	                			<img src="<?php echo $value->imagelink; ?>" class="rounded" alt="profile picture" style="max-height: 300px; max-width: 300px;">
	                		</div>
	                		<div class="py-2">
	                			<input class="btn btn-danger" type="file" name="file" id="file">
	                			<input class="btn btn-danger btn-lg" type="submit" name="submit">
	                		</div>
                		</form>
                	</div>
                	<div class="col-md-6">

                        <div id="loading" style="display:none;margin: 3%">
                            <img src="<?php echo base_url(); ?>assets/icon/806.gif" style="width: 5%;height: 8%" alt="Loading" />
                        </div>

                        <form method="post" action="<?php echo base_url(); ?>members/editMember">
                		<blockquote class="blockquote text-danger">
						  <h2 class="mb-0"><u>Activation</u></h2>
						</blockquote>

						<div class="btn-group btn-group-toggle" data-toggle="buttons">
						  <label class="btn btn-danger <?php if($value->is_active == "1"){ echo "active";} ?>">
						    <input type="radio" value="1" name="is_active" id="option1" <?php if($value->is_active == "1"){ echo "checked";} ?>> Active
						  </label>
						  <label class="btn btn-danger <?php if($value->is_active == "0"){ echo "active";} ?> ">
						    <input type="radio" value="0" name="is_active" id="option2" <?php if($value->is_active == "0"){ echo "checked";} ?>> Not-Active
						  </label>
						</div>

                		<blockquote class="blockquote text-danger">
						  <h2 class="mb-0"><u>General Information</u></h2>
						</blockquote>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Member Name:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="mem_name" id="mem_name" value="<?php echo $value->mem_name; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>सदस्य नाव :</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="mem_mname" id="mem_mname" value="<?php echo $value->mem_mname; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>सदस्य नाम :</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="mem_hname" id="mem_hname" value="<?php echo $value->mem_hname; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Registration Date:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="reg_date" id="reg_date" value="<?php echo $value->reg_date; ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Aadhar Number:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="aadhar_no" id="aadhar_no" value="<?php echo $value->aadhar_no; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Blood Group:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="blood_group" id="blood_group" value="<?php echo $value->blood_group; ?>">
                            </div>
                        </div>

                        <br><br>
                        <blockquote class="blockquote text-danger">
                          <h2 class="mb-0"><u>Business Information</u></h2>
                        </blockquote>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Service Name:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="service_name" id="service_name" value="<?php echo $value->service_name; ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Business Name:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="business_name" id="business_name" value="<?php echo $value->business_name; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>व्यवसायाचे नाव :</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="business_mname" id="business_mname" value="<?php echo $value->business_mname; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>व्यापार के नाम :</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="business_hname" id="business_hname" value="<?php echo $value->business_hname; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Service Info:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="s_p_info" id="s_p_info" value="<?php echo $value->s_p_info; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>सेवेची माहिती :</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="s_p_minfo" id="s_p_minfo" value="<?php echo $value->s_p_minfo; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>सेवा की जानकारी :</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="s_p_hinfo" id="s_p_hinfo" value="<?php echo $value->s_p_hinfo; ?>">
                            </div>
                        </div>

                        <br><br>
                        <blockquote class="blockquote text-danger">
                          <h2 class="mb-0"><u>Contact Information</u></h2>
                        </blockquote>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Address:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="address" id="address" value="<?php echo $value->address; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>पत्ता :</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="maddress" id="maddress" value="<?php echo $value->maddress; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>पता :</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="haddress" id="haddress" value="<?php echo $value->haddress; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Latitude & Longitude:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="lat" id="lat" value="<?php echo $value->lat; ?>">
                                <input type="text" name="log" id="log" value="<?php echo $value->log; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Mobile Number:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $value->mobile_no; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Landline Number:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="landline_no" id="landline_no" value="<?php echo $value->landline_no; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>E-Mail:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="email_id" id="email_id" value="<?php echo $value->email_id; ?>">
                                <input type="hidden" name="memid" value="<?php echo $value->mem_id; ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Website:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="website" id="website" value="<?php echo $value->website; ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md text-muted">
                                <h4>Youtube:</h4>
                            </div>
                            <div class="col-md">
                                <input type="text" name="youtube" id="youtube" value="<?php echo $value->youtube; ?>">
                            </div>
                        </div>


                	</div>
                    <div style="max-height: 150px" class="col-md-2" align="center">
                        <div class="card border-primary">
                            <div class="card-header bg-danger text-white"> <i class="fa fa-cog fa-spin"></i>  Actions</div>
                            <div class="card-body">
                                <div class="col-md">
                                	<input type="hidden" name="task" value="editMember">

                                    <button class="btn btn-success" type="submit" name="submit"> Update</button>
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
             url:"<?php echo base_url();?>members/editshopimage/<?php echo $this->uri->segment(3); ?>",
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
</script>