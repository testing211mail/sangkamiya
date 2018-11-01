<style type="text/css">
	 #myBtn {
    display: block; /* Hidden by default */
    position: fixed; /* Fixed/sticky position */
    bottom: 20px; /* Place the button at the bottom of the page */
    right: 30px; /* Place the button 30px from the right */
    z-index: 99; /* Make sure it does not overlap */
    border: none; /* Remove borders */
    outline: none; /* Remove outline */
    background-color: #7323DC; /* Set a background color */
    color: white; /* Text color */
    cursor: pointer; /* Add a mouse pointer on hover */
    padding: 15px; /* Some padding */
    border-radius: 15px; /* Rounded corners */
}
</style>


<div class="container">
<div class="w3-card-4 w3-white">

	<header class="w3-container w3-blue">
	  <h1 class="text-center"> <?php echo $contactInfo[0]->business_name; ?></h1>
	</header> 
 
	<div class="w3-container">
	 	<div class="row w3-margin">
	 		<div class="col-md-6 w3-padding" style="border-right: 2px solid rgba(0,0,0,0.1);">
	 			<img src="<?php echo $contactInfo[0]->imagelink;  ?>" alt="Image" class="w3-round-xlarge hvr-grow mx-auto d-block img-fluid pt-3 pb-3">		
	 		</div>

	 		<div class="col-md-6 w3-padding">
	 			<div class="card text-dark">
				  <div class="card-header w3-purple text-center"><?php echo $contactInfo[0]->s_p_info; ?></div>
				  <div class="card-body">
					    
					    <h4>
					    <p><span class="fa fa-user" style="margin-right: 10px;"></span> : <?php echo $contactInfo[0]->mem_name;  ?></p>
					    	<hr>
				        <p><span class="fa fa-map-marker" style="margin-right: 10px;"></span> : <?php echo $contactInfo[0]->address;  ?> </p>
				        <hr>
				        <p><a href="<?php echo 'tel:'.$contactInfo[0]->mobile_no;  ?>" ><span class="fa fa-mobile" style="margin-right: 10px;"></span> : <?php echo $contactInfo[0]->mobile_no;  ?></a></p>
				        <hr>
				        <?php
				        if ($contactInfo[0]->landline_no) {
				           echo '<a href="tel:'.$contactInfo[0]->landline_no.'" > <p><span class="fa fa-phone" style="margin-right: 10px;"></span> : '.$contactInfo[0]->landline_no.'</p></a> <hr>';
				          } 
				       ?>
				     <?php if ($contactInfo[0]->email_id) {
				     	echo '<p><span class="fa fa-envelope" style="margin-right: 10px;"></span> :  '.$contactInfo[0]->email_id.'</a></p> <hr>';
				     } ?>
				     <?php if ($contactInfo[0]->website) {
				     	echo '<p><span class="fa fa-globe" style="margin-right: 10px;"></span> :  <a href="'.$contactInfo[0]->website.'" target="_self">'.$contactInfo[0]->website.'</p>';
				     } ?>

            </h4>
				  </div>
				</div>
	 		</div>
	 	</div>
	</div>

<hr style="height:1px;border:none;color:#333;opacity: 0.2;background-color:#333;" />

<div class="w3-container w3-padding">
	<div class="row">
		<div class="col-md-6" style="border-right: 2px solid rgba(0,0,0,0.1);">
			<div class="alert w3-red text-center">Find us on Youtube</div>
			<iframe class="w3-card" width="100%" height="87%" src="https://www.youtube.com/embed/<?php if($contactInfo[0]->youtube){echo $contactInfo[0]->youtube;}else{ echo "_WULtW_-CC8";}?>">
		</iframe>	
		</div>
		<div class="col-md-6">
			<div class="alert w3-blue text-center">Find us on Google Maps</div>
			<div class="w3-card" id="map" style="height: 400px;width: 100%"></div>
		</div>
	</div>
</div>
<br><br><br><br><br>
</div>
<br>

<div class="modal modal-fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ask Query</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="POST" action="<?php echo base_url(); ?>home/askQuery" required>

          <div class="row">

          	<div class="form-group col-md-12">
              <label for="name">Your Name :</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" required="">
            </div>

             <div class="form-group col-md-12">
              <label for="contact">*Contact Number : </label>
              <input type="number" class="form-control" name="contact" id="contact" placeholder="Enter Contact Number" minlength="10" required="">
            </div>

          	<div class="form-group col-md-12">
              <label for="query">Query : </label>
              <textarea rows="3" class="form-control" name="query" id="query" required></textarea>
            </div>

           
            <input type="hidden" name="mem_id" value="<?php echo $contactInfo[0]->mem_id; ?>">
          </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="submit"  class="btn nb-majha">Submit</button>
      	</form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
</div>
     <!-- <button type="button" class="btn nb-majha" data-toggle="modal" data-target="#myModal">Enquiry</button> -->

 <button id="myBtn" data-toggle="modal" data-target="#myModal">Enquiry</button> 

<script>
  function initMap() {
    var myLatLng = {lat: <?php echo $contactInfo[0]->lat;  ?>, lng: <?php echo $contactInfo[0]->log;  ?>};

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 13,
      center: myLatLng
    });

    var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h4 id="firstHeading" class="firstHeading"><?php echo $contactInfo[0]->business_name;  ?></h4>'+
            '<div id="bodyContent">'+
            '<p><?php echo $contactInfo[0]->s_p_info;  ?></p>'+
            '</div>'+
            '</div>';

    var infowindow = new google.maps.InfoWindow({
          content: contentString
        });



    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      animation: google.maps.Animation.BOUNCE,
      title: '<?php echo $contactInfo[0]->business_name;  ?>'
    });

    marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
  }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9nomF8C0WwsS_cDzu4ByTdrFJmSP9EsQ&callback=initMap"> </script>
