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
<div class="container" style="width: 80%" align="center">
    <div class="" id="card_contacts">
        <div id="contacts" class="" aria-expanded="true" style="">
            <div id="contact-list">

            	<?php
                if(!empty($contactList))
                {

            	foreach($contactList as $contact) { 

            		echo '<div class="my-4">
            		<a href="'.base_url().'home/contactInfo/'.$contact->mem_id.'" style="text-decoration: none;">
                    <div class="row w-100 w3-card w3-white w3-hover-deep-purple">
                        <div class="col-sm-6 col-md-3 w3-padding">
                            <img src="'.$contact->imagelink.'" alt="'.$contact->business_name.'" style="max-height:170px;">
                        </div>
                        <div class="col-sm-6 col-md-9 text-center text-sm-left p-4">
                            <h2>'.$contact->business_name.'</h2>
                            <h5>
                            <p><span class="fa fa-user" style="margin-right: 10px;"></span> '.$contact->mem_name.'</p>
                            <p><span class="fa fa-phone" style="margin-right: 10px;"></span> '.$contact->mobile_no.'</p>
                            <p><span class="fa fa-map-marker" style="margin-right: 10px;"></span> '.$contact->address.' </h5></p>
                        </div> 
                    </div>
                    </a>
                </div>';
            	 }
                }
                else{
                     echo '<h1 class="alert alert-danger m-auto"> No Data Available</h1>';
                }             
                ?>
            </div>  
        </div>
    </div>
<button a id="myBtn" onclick="getLocation()">Search NearBy</button>

</div>

<script>


function getLocation() {
  //  var x = document.getElementById("demo");
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
     //   x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
   // var x = document.getElementById("demo");
  //  x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
    var lat =position.coords.latitude;
    var long =position.coords.longitude;
    console.log('coordinates'+lat+'  '+long);
    getNearby(lat,long);
}

function getNearby(lat,long) {
    console.log('in getNearby');
    console.log(lat);
    console.log(long);
    var servId ="<?php echo $this->uri->segment(3); ?>";
    console.log(servId);

    window.location.replace("<?php echo base_url().'home/getNearby/'.$this->uri->segment(3).'/'; ?>"+lat+"/"+long);

    console.log("<?php echo base_url().'home/getNearby/'.$this->uri->segment(3).'/'; ?>"+lat+"/"+long);
}

</script>