<div class="container">
	<h3 class="text-center text-uppercase pb-4"><?php echo $this->session->userdata('about'); ?></h3>
	<div class="card-deck">
		<div class="card border-dark">
			<div class="card-header bg-4 text-center text-white"><?php echo $this->session->userdata('abt1h'); ?></div>
			<div class="card-body text-purple">
				<h4 class="card-title"><?php echo $this->session->userdata('abt1n'); ?></h4>
				<i class="fa fa-phone mb-3" aria-hidden="true"></i>
				<a href="tel:+91-7620964524">+91-7620964524</a>
			</div>
		</div>

		<div class="card border-dark">
			<div class="card-header bg-2 text-center text-white"><?php echo $this->session->userdata('abt2h'); ?></div>
			<div class="card-body text-purple">
				<h4 class="card-title"><?php echo $this->session->userdata('abt2n'); ?></h4>
				<i class="fa fa-phone mb-3" aria-hidden="true"></i>
				<a href="tel:+91-8007751143">+91-8007751143</a>
				<p><i class="fa fa-envelope mb-3" aria-hidden="true"></i> rakhikelhe@sangkamya.com</p>
			</div>
		</div>

		<div class="card border-dark">
			<div class="card-header bg-info text-center text-white"><?php echo $this->session->userdata('abt3h'); ?></div>
			<div class="card-body text-purple">
				<h4 class="card-title"><?php echo $this->session->userdata('abt3n'); ?></h4>
				<i class="fa fa-phone mb-3" aria-hidden="true"></i>
				<a href="tel:+91-9511608150">+91-9511608150</a>
				<p><i class="fa fa-envelope mb-3" aria-hidden="true"></i> contactus@sangkamya.com</p>
			</div>
		</div>
	</div>

<section id="contactPage" class="pt-4">
	<div class="card-deck text-center">
		<div class="card border-dark">
			<div class="card-body">
				<span><i class="fa fa-building fa-5x mb-3" aria-hidden="true" style="color: red;"></i>
                <address><?php echo $this->session->userdata('add'); ?></address></span>
			</div>
		</div>

		<div class="card border-dark">
			<div class="card-body">
				<div id="map" style="height: 200px;width: 100%">
    
      			</div>
			</div>
		</div>
	</div>

	<div class="card-deck text-center pt-4">

		<div class="card border-dark">
			<a target="_blank" href="<?php echo base_url(); ?>">
			<div class="card-body">
				<i class="fa fa-globe fa-5x mb-3" aria-hidden="true" style="color: blue;"></i>
				
                <!-- <p>sangkamya.com</p> -->
			</div>
			<div class="card-footer">
				<p>Visit</p>
			</div>
			</a>
		</div>

		<div class="card border-dark">
			<a target="_blank" href="https://play.google.com/store/apps/details?id=in.weoto.sangkamya">
			<div class="card-body">
				<i class="fa fa-android fa-5x mb-3" aria-hidden="true" style="color: green;"></i>
				
                <!-- <p>Sangkamya</p> -->
			</div>
			<div class="card-footer">
				<p>Our App</p>
			</div>
		</a>
		</div>
		<div class="card border-dark">
			<a target="_blank" href="https://www.facebook.com/sangkamya.webapp">
			<div class="card-body">
				<i class="fa fa-facebook fa-5x mb-3" aria-hidden="true" style="color: #3B5998 ;"></i>
				
                <!-- sangkamya.webapp -->
			</div>
			<div class="card-footer">
				<p>Like Us</p>
			</div>
		</a>
		</div>

		<div class="card border-dark">
			<a target="_blank" href="https://twitter.com/@sangkamya">
			<div class="card-body">
				<i class="fa fa-twitter fa-5x mb-3" aria-hidden="true" style="color:#0084b4;"></i>
							</div>
			<div class="card-footer">
				<p>Follow Us</p>
			</div>
		</a>
		</div>

		<!-- <div class="card border-dark">
			<a target="_blank" href="https://www.instagram.com/sangkamya/">
			<div class="card-body">
				<i class="fa fa-instagram fa-5x mb-3" aria-hidden="true" style="color: #cd486b;"></i>
			</div>
			<div class="card-footer">
				<p>Folllow Us</p>
			</div>
		</a>
		</div> -->

		<div class="card border-dark">
			<a target="_blank" href="https://www.instagram.com/sangkamya/">
		  <div align="center" style="padding: 20%;margin-top: 5px;">
		  	<img class="card-img-top" src="<?php echo base_url().'assets/insta.png'; ?>" alt="Card image cap">
		  </div>
		  <!-- <div class="card-body">
		  </div> -->
		  <div class="card-footer">
				<p>Follow Us</p>
			</div>
		</a>
		</div>

		<div class="card border-dark">
			<a target="_blank" href="https://www.youtube.com/channel/UCOpGuubt_Uukzg-kkq3xUsQ">
			<div class="card-body">
				<i class="fa fa-youtube fa-5x mb-3" aria-hidden="true" style="color:#FF0000;"></i>
				
                <!-- <p>Sangkamya Web App</p> -->
			</div>
			<div class="card-footer">
				<p>Youtube</p>
			</div>
		</a>
		</div>

		<!-- <div class="card text-black border-dark">
		  <img class="card-img mt-4" src="<?php echo base_url().'assets/call_us.png'; ?>" alt="Card image" style="opacity: 0.5;">
		  <div class="card-img-overlay p-0">
		    <p class="card-text font-weight-bold" style="position: absolute;top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 18px;">8007751143</p>
		</div>
		</div> 

		<div class="card border-dark">
			<a target="_blank" href="<?php echo base_url(); ?>">
			<div class="card-body">
				<img src="<?php echo base_url().'assets/call-us-min.png'; ?>" alt="Card image" style="opacity: 0.5;">
			</div>
			<div class="card-footer">
				<p>8007751143</p>
			</div>
			</a>
		</div>-->

		<div class="card border-dark">
			<a href="tel:8007751143">
		  <img class="card-img-top" src="<?php echo base_url().'assets/call_us.png'; ?>" alt="Card image cap" style="margin-top: 60px;">
		  <div class="card-body">
		  </div>
		  <div class="card-footer">
				<p>8007751143</p>
			</div>
		</a>
		</div>


	</div>
</section>

</div>

<script>
  function initMap() {
    var myLatLng = {lat:20.583702, lng:74.509543};

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: myLatLng
    });

    var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h4 id="firstHeading" class="firstHeading">OFFICE</h4>'+
            '<div id="bodyContent">'+
            '</div>'+
            '</div>';

    var infowindow = new google.maps.InfoWindow({
          content: contentString
        });



    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      animation: google.maps.Animation.BOUNCE,
      title: 'OFFICE LOCATION'
    });

    marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
  }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANCl0klfL79sA_xKJqM5JGpH2fTYOEDZc&callback=initMap"> </script>
