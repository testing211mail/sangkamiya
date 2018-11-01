
<h1 class="text-center"> <u><?php echo $contactInfo[0]->business_name;  ?></u> </h1>

<!-- <?php print_r($contactInfo);  ?>
 -->

<div class="container">

  <div class="row border border-dark">      
      <div class="col-12 col-sm-6 col-md-6 px-0">
          <img src="<?php echo $contactInfo[0]->imagelink;  ?>" alt="Image" class="rounded hvr-grow mx-auto d-block img-fluid pt-3 pb-3">
      </div> 
      <div class="col-12 col-sm-6 col-md-6 my-auto mx-auto">
        <h4><?php echo $contactInfo[0]->s_p_info; ?></h4>
        <br>
        <h4><p><span class="fa fa-user" style="margin-right: 10px;"></span> : <?php echo $contactInfo[0]->mem_name;  ?></p>
        <p><span class="fa fa-map-marker" style="margin-right: 10px;"></span> : <?php echo $contactInfo[0]->address;  ?>
        <a href="<?php echo 'tel:'.$contactInfo[0]->mobile_no;  ?>" ><p><span class="fa fa-mobile" style="margin-right: 10px;"></span> : <?php echo $contactInfo[0]->mobile_no;  ?></a></p>

        <?php
        if ($contactInfo[0]->landline_no) {
           echo '<a href="tel:'.$contactInfo[0]->landline_no.'" > <p><span class="fa fa-phone" style="margin-right: 10px;"></span> : '.$contactInfo[0]->landline_no.'</p></a>';
          }  
       
       ?>
     </h4>
        <p><span class="fa fa-envelope" style="margin-right: 10px;"></span> : <?php echo $contactInfo[0]->email_id;  ?></p>
      </div>
</div>

<hr style="height:1px;border:none;color:#333;background-color:#333;" />

<div class="row">
      <div id="map" style="height: 400px;width: 100%">
    
      </div>
</div>


</div>






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

 /* function counterFunc(){

    var url = "<?php echo base_url();?>home/callCounter";
    memId = <?php echo $contactInfo[0]->mem_id; ?>;
    $.ajax({
        type: 'POST',
        data: {"memId":memId},
        url: url,
        success: function(data) {
          console.log(data);
            
        }
    });
  }*/
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9z98O8_0kfZB3OPBFwWEaOukrMhEiFLI &callback=initMap"> </script>
