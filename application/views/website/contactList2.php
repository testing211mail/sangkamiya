
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
                        <div class="col-sm-6 col-md-8 text-center text-sm-left p-4">
                            <h2>'.$contact->business_name.'</h2>
                            <h5>
                            <p><span class="fa fa-user" style="margin-right: 10px;"></span> '.$contact->mem_name.'</p>
                            <p><span class="fa fa-phone" style="margin-right: 10px;"></span> '.$contact->mobile_no.'</p>
                            <p><span class="fa fa-map-marker" style="margin-right: 10px;"></span> '.$contact->address.' </h5></p>
                        </div>
                        <div class="col-sm-6 col-md-1 w3-left">
                            <img src="'.base_url().'assets/dis.png" alt="img" style="max-height:50px;">
                            <h4>'.$contact->distance.' KM</h4>
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