
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php if (isset($title)) { echo $title; } else { echo "Sang Kamya"; } ?></title>
  <!-- Bootstrap core CSS-->
<!--  --> 
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">




<!-- CSS file -->
<link rel="stylesheet" href="autocomplete/easy-autocomplete.min.css"> 
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

  <!-- JS file -->
<script src="autocomplete/jquery.easy-autocomplete.min.js"></script> 

<!-- Additional CSS Themes file - not required-->
<link rel="stylesheet" href="autocomplete/easy-autocomplete.themes.min.css"> 





  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url();?>assets/css/carousel.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/css/myStyles.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/css/hover-min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<style type="text/css">
  .ui-autocomplete-category {
    font-weight: bold;
    padding: .1em .2em;
    margin: .4em 0 .1em;
    line-height: 1;
  }
</style>

</head>
<body>

  <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top nb-majha">
        <a class="navbar-brand hvr-underline-from-center" href="<?php echo base_url(); ?>"><span class="notranslate">सांगकाम्या</span> <sub>तुमचे कार्य - आमचे सहकार्य </sub></a>
       <!--  <?php print_r($search)?> -->
        <!-- <a class="hvr-underline-from-center" href="<?php echo base_url();?>">
        <img class="navbar-brand p-0" src="<?php echo base_url();?>assets/logo2.png" alt="logo"></a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-center <?php if(current_url() == base_url()){echo 'active';} ?>" href="<?php echo base_url();?>">होम</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-center <?php if($this->uri->segment(1)=='about'){echo 'active';}?>" href="<?php echo base_url().'about';?>">याबद्दल</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-center <?php if($this->uri->segment(1)=='feedback'){echo 'active';}?>" href="<?php echo base_url().'feedback';?>">अभिप्राय</a>
            </li>
          </ul>
            <form class="form-inline mt-2 mt-md-0 my-2 my-lg-0">
          <div class="input-group">
           <input type="text" id="search_box" class="form-control" placeholder="शोध" aria-label="Search" aria-describedby="basic-addon2" />
              <div id="suggesstion-box"></div>
            <div class="input-group-append">
              <button class="btn btn-outline-info" type="button" id="sbtn"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>

        <div id="google_translate_element"></div>
        
        </div>
      </nav>
    </header>

    <main role="main">


      <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">

        	<?php 
        	if ($imgLinks) {
        		foreach ($imgLinks as $ind => $link) {
	        		if ($ind == 0) {
	        			echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
	        		}
	        		else{
	        			echo '<li data-target="#myCarousel" data-slide-to="'.$ind.'"></li>';
	        		}
	        	}
        	}
        	?>
        </ol>
        <div class="carousel-inner">
        	<?php 

        	if ($imgLinks) {
        		foreach ($imgLinks as $ind => $link) {
	        		if ($ind == 0) {
	        			echo '<div class="carousel-item active">';
	        		}
	        		else{
	        			echo '<div class="carousel-item">';
	        		}	
	        			echo '<a href="'.base_url().'home/contactInfo/'.$link->mem_id.'">';
	            			echo '<img class="animated zoomInDown w-100 h-100" src="'.$link->imagelink.'" alt="slide">';
	            		echo '</a>';
	          		echo '</div>';
	        	}
        	}
        	else{
        		echo '<div class="jumbotron alert-danger text-center">No Ads Available</div>';
        	}

        	?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

<script>

function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'mr', includedLanguages: 'en,hi,mr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}

jQuery(function($) {
  $('#sbtn').click(function(){
    search();
});
  function search()
  {
    var a= document.getElementById("search_box").value;
       n=<?php echo json_encode($names); ?>;
       i=<?php echo json_encode($ids); ?>;
       t=<?php echo json_encode($types); ?>;
       if(n.includes(a))
       {

        index=n.indexOf(a);
        //console.log(index);
        type=t[index];
        id=i[index];
        if(type=="category")
        {
          var cat=["education","food","government","health","lifestyle","services","shops"]
           window.location.href = "<?php echo base_url().'home/';?>"+cat[id-1]; 
        }
        if(type=="service")
        {
           window.location.href = "<?php echo base_url().'home/contactList/';?>"+id; 
        }
        if(type=="contact")
        {
          window.location.href = "<?php echo base_url().'home/contactInfo/';?>"+id; 
          //alert("contact");
        }
       }

  }
 
 $('#search_box').typeahead({
 	source:<?php echo json_encode($names); ?>
 });
 $('#search_box').keyup(function(event) {
    if (event.keyCode === 13) {
      search();
      
    	
    }
});
 
});
</script>




