<body>


    <div class="container col-lg-6 mx-auto mt-5">
        <?php echo $this->session->flashdata('successMsg');  ?>
    <div class="card">
      <div class="card-header">अभिप्राय</div>
      <div class="card-body">
        <form action="<?php echo base_url();?>home/submitFeedback" method="post">
          <div class="form-group">
            <!-- <label for="username">Full Name</label> -->
            <input class="form-control" id="name" name="name" type="text" placeholder="आपले नांव लिहा" required>
          </div>
          <div class="form-group">
            <!-- <label for="contact">Contact / E-mail</label> -->
            <input class="form-control" id="contact" name="contact" type="text" minlength="10" placeholder="आपला संपर्क प्रविष्ट करा [Phone / Mail]" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="feedback" name="comment" placeholder="अभिप्राय" rows="3" required></textarea>
           </div>
           <button type="submit" class="btn btn-primary btn-block">सबमिट</button>
        </form>
      </div>
    </div>
  </div>
</body>