<div class="container ulnone text-center">
	<h1 class="tc-4 font-weight-bold"><u><?php print_r($servList['category_name']);  ?></u></h1>
	<br>

	<div class='row'>
		<?php

		if(!empty($servList['services']))
            {
			$i=0;
			foreach($servList['services'] as $ed) {
				$c=$i%5 + 1;
				echo '<div class="col-lg-2 col-md-3 col-xs-6 hvr-grow">';
				  echo '<a href="'.base_url().'home/contactList/'.$ed->ser_id.'" class="d-block mb-4 h-100">';
				    echo '<img class="img-fluid" src="'.$ed->iconlink.'" alt="Image" style="height:150px;width:90%;">';
				    	echo '<h6><div class="rounded bg-'.$c.' p-2" style="margin-top:7px;">'.$ed->service_name.'</div></h6>';
				  echo '</a>';
				echo '</div>';			
				$i++;
				if ($i % 6 == 0) {echo '</div><div class="row">';}
			}			
		}
		else{
				echo '<h1 class="alert alert-danger m-auto"> No Data Available</h1>';
			}
		?>
	</div>
</div>

