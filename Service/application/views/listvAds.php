<div class="container-fluid">
<div align="right">
    <a class="btn btn-primary" href="<?php echo base_url(); ?>videoads/addVad"><i class="fa fa-plus"></i> Add V Advertisement</a>
</div>
<br>
<div class="col-md-12" align="center">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i> List of Video Advertisements </div>
          <div class="card-body">
                <?php echo $this->session->flashdata('alert'); ?>
                <div class="row">
                 <div class="table-responsive content table-full-width">
                    <table id="myTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-success text-white" align="center">
                        <tr>
                            <th>#</th>
                            <th>Ad Date</th>
                            <th>Video Link</th>
                            <th><i class="fa fa-cog fa-spin"></i></th>
                        </tr>
                        </thead>
                        <tbody id="serviceTable">
                        <?php if (!empty($result)) {
                                foreach ($result as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value->ad_date; ?></td>
                                        <td align="center"><video width="200" height="200" controls><source src="<?php echo $value->videolink; ?>" type="video/mp4">Your browser does not support the video tag.</video></td>
                                        <td align="left">
                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" onclick="showdel(<?php echo $value->vidad_id; ?>)"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                        </tbody>
                            <?php }}else{ ?>
                                <div class="alert alert-info"><strong>Oops!</strong> No ads to display.</div>
                            <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="deleteadmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete This Advertisement?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable({"ordering": false});
});

function showdel(id)
  {
    $('#deleteadmodal').modal({
            backdrop: 'static',
            keyboard: true
       });
      var data='<div class="alert alert-danger"> Are you sure you want to delete this Advertisement?</div> </div><div class="modal-footer"><button type="button" class="btn btn-danger" onclick="deletead('+id+');" > Yes</button>  <button type="button" class="btn btn-info" data-dismiss="modal"> No</button></div>';
    $('#deleteadmodal .modal-body').html(data);
  }

  function deletead(id)
  {
    var url = "<?php echo base_url(); ?>videoads/deletead"; 
      $.ajax({
          type: "POST",
          url: url,         
          data: {'id':id},
          success: function (response) { 
              window.location.reload();
          },
          error: function (req, status, error) {
              alert("Network Error!");
          }
      });
  }
</script>


