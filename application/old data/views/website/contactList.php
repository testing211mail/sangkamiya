
<div class="container">
    <div class="card card-default" id="card_contacts">
        <div id="contacts" class="panel-collapse collapse show" aria-expanded="true" style="">
            <ul class="list-group pull-down" id="contact-list">

            	<?php

                if(!empty($contactList))
                {

            	foreach($contactList as $contact) { 

            		echo '<li class="list-group-item">
            		<a href="'.base_url().'home/contactInfo/'.$contact->mem_id.'" style="text-decoration: none;">
                    <div class="row w-100">
                        <div class="col-12 col-sm-6 col-md-3 px-0">
                            <img src="'.$contact->imagelink.'" alt="'.$contact->business_name.'" class="rounded mx-auto d-block img-fluid pt-4" style="max-height:170px;">
                        </div>
                        <div class="col-12 col-sm-6 col-md-9 text-center text-sm-left p-4">
                            <h2>'.$contact->business_name.'</h2>
                            <h5>
                            <p><span class="fa fa-user" style="margin-right: 10px;"></span> '.$contact->mem_name.'</p>
                            <p><span class="fa fa-phone" style="margin-right: 10px;"></span> '.$contact->mobile_no.'</p>
                            <p><span class="fa fa-map-marker" style="margin-right: 10px;"></span> '.$contact->address.' </h5></p>
                        </div> 
                    </div>
                    </a>
                </li>';
            	 }
                }
                else{
                     echo '<h1 class="alert alert-danger m-auto"> No Data Available</h1>';
                }             
                ?>
            </ul>  
        </div>
    </div>
</div>