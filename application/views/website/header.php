<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php if (isset($title)) { echo $title; } else { echo "Sang Kamya"; } ?></title>
  <!-- Bootstrap core CSS-->
<!--  --> 
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="<?php echo base_url();?>assets/css/mat.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">




<!-- CSS file -->
<link rel="stylesheet" href="autocomplete/easy-autocomplete.min.css">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <meta name="Description" content="Basic Pramukh Type Pad to easily type in Assamese, Bengali, Bodo, Dogri, Gujarati, Hindi, Kannada, Konkani, Maithili, Malayalam, Manipuri, Marathi, Meitei (Manipuri), Nepali, Odia, Punjabi, Sanskrit, Santali (Ol Chiki), Sindhi, Sora, Tamil and Telugu" />
    <meta name="keywords" content="Indian, Language, Assamese, Bengali, Manipuri, Bodo, Dogri, Gujarati, Hindi, Kannada, Konkani, Maithili, Malayalam, Meitei, Manipuri, Marathi, Nepali, Odia, Punjabi, Sanskrit, Santali, Ol Chiki, Sindhi, Sora, Tamil, Telugu, Type pad, Unicode, transliteration " />
    
 <!--    <link rel="shortcut icon" href="img/pramukhime.ico" type="image/x-icon"/> -->


  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
  <script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "55a65b53-2d97-47ca-a66d-342d5c4015eb",
    });
  });
</script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

  <!-- JS file -->
<!-- 
<script src="autocomplete/jquery.easy-autocomplete.min.js"></script> --> 

<!-- Additional CSS Themes file - not required-->
<link rel="stylesheet" href="autocomplete/easy-autocomplete.themes.min.css"> 





  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url();?>assets/css/carousel.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/css/myStyles.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/css/hover-min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="http://www.google.com/jsapi"> </script>
  <!--  <script type="text/javascript">

      // Load the Google Transliterate API
      google.load("elements", "1", {
            packages: "transliteration"
          });

      function onLoad() {
        var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                [google.elements.transliteration.LanguageCode.HINDI],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };

        // Create an instance on TransliterationControl with the required
        // options.
        var control =
            new google.elements.transliteration.TransliterationControl(options);

        // Enable transliteration in the textbox with id
        // 'transliterateTextarea'.
        var l = "<?php echo $this->session->userdata('lang'); ?>";
        //String(l);
        //console.log(l);
        
        if (l=='english') {
          var ids = [];
        }
        else{
          var ids = ["search_box"];
        }
        control.makeTransliteratable(ids);
      }
      google.setOnLoadCallback(onLoad);
    </script> -->

<!-- <script type="text/javascript">
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
    // Create an instance on TransliterationControl with the required
    // options.
    var control =
        new google.elements.transliteration.TransliterationControl(options);

        var l = "<?php echo $this->session->userdata('lang'); ?>";
        //String(l);
        //console.log(l);
        
        if (l=='english') {
          var ids = [];
        }
        else{
          var ids = ["search_box"];
        }
    // Enable transliteration in the textfields with the given ids.
    control.makeTransliteratable(ids);
    // Show the transliteration control which can be used to toggle between
    // English and Hindi and also choose other destination language.
    control.showControl('translControl');
  }
  google.setOnLoadCallback(onLoad);
</script> -->


<!-- <style type="text/css">
  .ui-autocomplete-category {
    font-weight: bold;
    padding: .1em .2em;
    margin: .4em 0 .1em;
    line-height: 1;
  }
</style> -->

</head>
<body>

  <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top nb-majha p-0 px-1">
        <a class="navbar-brand hvr-underline-from-center" href="<?php echo base_url(); ?>">
        	<img class="navbar-brand p-0" src="<?php echo base_url();?>assets/finallogocropped.png" alt="logo" height="56px" width="56px"> सांगकाम्या <sub style="font-size: 12px"> तुमचे कार्य - आमचे सहकार्य </sub></a>
        <!-- <a class="hvr-underline-from-center" href="<?php echo base_url();?>">
        <img class="navbar-brand p-0" src="<?php echo base_url();?>assets/finallogo.png" alt="logo" height="60px" width="150px" ></a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-center <?php if(current_url() == base_url()){echo 'active';} ?>" href="<?php echo base_url();?>"><h4><?php echo $this->session->userdata('home'); ?></h4></a>
            </li>
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-center <?php if($this->uri->segment(1)=='about'){echo 'active';}?>" href="<?php echo base_url().'about';?>"><h4><?php echo $this->session->userdata('about'); ?></h4></a>
            </li>
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-center <?php if($this->uri->segment(1)=='feedback'){echo 'active';}?>" href="<?php echo base_url().'feedback';?>"><h4><?php echo $this->session->userdata('feedback'); ?></h4></a>
            </li>
            <li class="nav-item">
              <a class="nav-link hvr-underline-from-center <?php if($this->uri->segment(1)=='register'){echo 'active';}?>" href="<?php echo base_url().'register';?>"><h4><?php echo $this->session->userdata('register'); ?></h4></a>
            </li>
          </ul>
            <form class="form-inline mt-2 mt-md-0 my-2 my-lg-0">
          <div class="input-group">
           <input type="text" id="search_box" class="form-control" placeholder="<?php echo $this->session->userdata('search'); ?>" aria-label="Search" aria-describedby="basic-addon2" />
              <div id="suggesstion-box"></div>
            <div class="input-group-append">
              <button class="btn btn-outline-info" type="button" id="sbtn"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>

        <div class="input-group pl-2" style="width: auto;">
          <form method="POST" action="<?php echo base_url().'home/changelanguage';?>">
              <select id="selectLanguage" class="form-control custom-select custom-select-sm"  name="sellang" onchange="this.form.submit()">
                <option <?php if ($this->session->userdata('lang') == 'marathi') {
                  echo "selected";
                } ?> value="marathi">मराठी</option>
                <option <?php if ($this->session->userdata('lang') == 'hindi') {
                  echo "selected";
                } ?> value="hindi">हिंदी</option>
                <option <?php if ($this->session->userdata('lang') == 'english') {
                  echo "selected";
                } ?> value="english">English</option>
              </select>
            </form>
        </div>

        
        </div>
      </nav>
    </header>

    <main role="main">


      <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" style="margin-top: 13px;">
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
                    echo '<img class="animated fadeIn w-100 h-100" src="'.$link->imagelink.'" alt="slide">';
                  echo '</a>';
                echo '</div>';
            }
          }
          else{
			             echo '<div class="carousel-item active">';
			                 echo '<img class="animated fadeIn  w-100 h-100" src="'.base_url().'assets/default_min.jpg'.'" alt="First slide">';
			             echo '</div>';
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


 // Load the Google Transliteration API

 



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
 // search();
    if (event.keyCode === 13) {
      search();
      
      
    }
});
 
});
</script>

 <script type="text/javascript" src="<?php echo base_url();?>assets/js/pramukhime.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/pramukhindic.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/pramukhindic-i18n.js"></script>
    <script language="javascript" type="text/javascript">
      function languageDropdownChanged() {

      var l = "<?php echo $this->session->userdata('lang'); ?>";
      var lang="english";        
        if (l=='marathi') {
          lang="marathi";   
           o="pramukhindic";   
          
        }
        else  if(l=="hindi"){
          o="pramukhindic";
           lang="hindi";      
        }
        else
        {
          o="pramukhime";
           lang="english";      
        }
      pramukhIME.setLanguage(lang,o);
      
    }


        document.getElementById('search_box').onclick = languageDropdownChanged;

        pramukhIME.addKeyboard("PramukhIndic");
        pramukhIME.enable();
    </script>




