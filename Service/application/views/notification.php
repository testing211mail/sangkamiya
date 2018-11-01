<div class="container">

  <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-eng-tab" data-toggle="pill" href="#pills-eng" role="tab" aria-controls="pills-eng" aria-selected="true">English</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-marathi-tab" data-toggle="pill" href="#pills-marathi" role="tab" aria-controls="pills-marathi" aria-selected="false">मराठी /हिंदी</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-eng" role="tabpanel" aria-labelledby="pills-eng-tab">
    <div class="card mx-5 mt-5">
      <div class="card-header">Send Notificatiion</div>
      <div class="card-body">
        <form action="<?php echo base_url();?>notification/sendnotification" method="post">
          <div class="form-group">
           <?php echo $this->session->flashdata('alert'); ?>
           </div>
          <div class="form-group">
            <label for="title">Title :</label>
            <input class="form-control" id="title" name="title" type="text" required>
          </div>
          <div class="form-group">
            <label for="description">Description :</label>
            <input class="form-control" id="description" name="description" type="text" required>
          </div>          
      </div>
      <div class="card-header">
        <button type="submit" class="btn btn-primary btn-block">Send</button>
      </div>
       </form>
    </div>

  </div>
  <div class="tab-pane fade" id="pills-marathi" role="tabpanel" aria-labelledby="pills-marathi-tab">
    <div class="card mx-5 mt-5">
      <div class="card-header">सूचना पाठवा</div>
      <div class="card-body">
        <form action="<?php echo base_url();?>notification/sendnotification" method="post">
          <div class="form-group">
           <?php echo $this->session->flashdata('alert'); ?>
           </div>
          <div class="form-group">
            <label for="title">शीर्षक :</label>
            <input class="form-control" id="mtitle" name="title" type="text" required>
          </div>
          <div class="form-group">
            <label for="description">वर्णन :</label>
            <input class="form-control" id="mdescription" name="description" type="text" required>
          </div>          
      </div>
      <div class="card-header">
        <button type="submit" class="btn btn-primary btn-block">पाठवा</button>
      </div>
       </form>
    </div>

  </div>
</div>


</div>


<script type="text/javascript" src="http://www.google.com/jsapi"></script>
  <script type="text/javascript">
  // Load the Google Transliteration API

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

    var control = new google.elements.transliteration.TransliterationControl(options);
    // Enable transliteration in the textfields with the given ids.
    var ids = [ "mtitle" ,"mdescription"];
    control.makeTransliteratable(ids);
    // Show the transliteration control which can be used to toggle between
    // English and Hindi and also choose other destination language.
    control.showControl('translControl');
  }
  google.setOnLoadCallback(onLoad);

</script>