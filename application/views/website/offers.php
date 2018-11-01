<div class="container">
	<h1 class="tc-4 font-weight-bold text-center"><u>Special Offers</u></h1>

	<?php 

	foreach ($offers as $offer) {
		echo '<a href="'.base_url().'home/contactInfo/'.$offer->mem_id.'" style="text-decoration: none;"> <img src="'.$offer->imagelink.'" class="img-fluid p-4" alt="Responsive image" style="width:100%;"></a>';
	}
	?>

</div>
