<script type="text/javascript" src="http://www.google.com/jsapi"></script>
  <script type="text/javascript">

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
    var control = new google.elements.transliteration.TransliterationControl(options);
    var ids = [ "MemmName" ,"MemhName","BusinessmName","BusinesshName","BusinessmAdd","BusinesshAdd","sandpm","sandph"];
    control.makeTransliteratable(ids);
    control.showControl('translControl');}
  google.setOnLoadCallback(onLoad);

</script>

<div class="contain-fluid">
  <div class="col-md-12">
    <div class="card border-primary">
      <div class="card-header nb-majha text-white text-center"> <i class="fa fa-table"></i> Registration Form </div>
      <div class="card-body">
      	<?php $this->session->flashdata('alert') ?>
      	
      	<h3 class="text-danger">* fields are mandatory!</h3>
        <form method="POST" action="<?php echo base_url(); ?>home/insertEnquiry">
          

          <div id="loading" style="display:none;margin: 3%">
            <img src="<?php echo base_url(); ?>assets/icon/806.gif" style="width: 5%;height: 8%" alt="Loading" />
          </div>

          <div class="row">
          	<div class="form-group col-md-6">
              <label for="MemName">*Member Name : </label>
              <input type="text" class="form-control" name="mem_name" id="MemName" placeholder="Enter Member Name" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="BusinessName">*Business Name : </label>
              <input type="text" class="form-control" name="business_name" id="BusinessName" placeholder="Enter Business Name" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="BusinessAdd">*Business Address : </label>
              <input type="text" class="form-control" name="address" id="BusinessAdd" placeholder="Enter Business Address" required="">
            </div>


            <div class="form-group col-md-6">
              <label for="sandp">Service & Product Details : </label>
              <input type="text" class="form-control" name="s_p_info" id="sandp" placeholder="Enter Product Details">
            </div>

            <div class="form-group col-md-6">
              <label for="contact">*Contact Number : </label>
              <input type="number" class="form-control" name="mobile_no" id="contact" placeholder="Enter Contact Number" min="10" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="landline">Landline Number : </label>
              <input type="text" class="form-control" name="landline_no" id="landline" placeholder="Enter Landline Number">
            </div>

            <div class="form-group col-md-6">
              <label for="aadhar">Aadhar Number : </label>
              <input type="text" class="form-control" name="aadhar_no" id="aadhar" placeholder="Enter Aadhar Number">
            </div>

            <div class="form-group col-md-6">
              <label for="bgroup">Blood Group : </label>
              <input type="text" class="form-control" name="blood_group" id="bgroup" placeholder="Enter Blood Group">
            </div>

            <div class="form-group col-md-6">
              <label for="email">Email Id : </label>
              <input type="email" class="form-control" name="email_id" id="email" placeholder="Enter Email ID">
            </div>

            <div class="form-group col-md-6">
              <label for="website">Website Link: </label>
              <input type="text" class="form-control" name="website" id="website" placeholder="Enter Website Address">
            </div>

            
            <div class="col-md-12 text-center" >
              <button type="submit"  class="btn nb-majha">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>