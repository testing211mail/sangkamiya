<style type="text/css">
    table{
        font-size: 12px;
        border-spacing:0;
        border-collapse:collapse;
        padding: 0;
        margin: 0;
    }
</style>
<div class="container-fluid">

<br>
<div class="col-md-12" align="center">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i> List Enquiry</div>
          <div class="card-body">
            <?php echo $this->session->flashdata('alert'); ?>
                <div class="row">
                 <div class="table-responsive content table-full-width">
                    <table id="memberTable" class="display table table-bordered table-striped table-hover">
                        <thead class="bg-success text-white" align="center">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Member Name</th>
                            <th>Business Name</th>
                            <th>Address</th>
                            <th>Mobile</th>
                            <th><i class="fa fa-cog fa-spin"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($result)) { //print_r($result);exit();
                                foreach ($result as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $value->reg_date; ?></td>
                                        <td><?php echo $value->mem_name ?></td>
                                        <td><?php echo $value->business_name; ?></td>
                                        <td><?php echo $value->address; ?></td>
                                        <td><?php echo $value->mobile_no; ?></td>
                        
                                        <td align="left">
                                         <a href="<?php echo base_url(); ?>Registration/viewenquiry/<?php echo $value->reg_id ;?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-original-title="View"><i class="fa fa-eye"></i></a>
                                          <a href="<?php echo base_url(); ?>Registration/makemember/<?php echo $value->reg_id ;?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="Add"><i class="fa fa-plus"></i></a>
                                          <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" onclick="showdel(<?php echo $value->reg_id; ?>)"><i class="fa fa-trash"></i></a>
                                         
                                        </td>
                                    </tr>
                                    <?php } ?>
                        </tbody>
                            <?php } else{ ?>
                                <div class="alert alert-info"><strong>Oops!</strong> No members to display.</div>
                            <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="deletemembermodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete This Registration?</h5>
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
    
   $('#memberTable').DataTable();
});

function showdel(id)
  {
    $('#deletemembermodal').modal({
            backdrop: 'static',   // This disable for click outside event
            keyboard: true        // This for keyboard event
       });
      var data='<div class="alert alert-danger">Are you sure you want to delete this Record?</div> </div><div class="modal-footer "><button type="button" class="btn btn-danger" onclick="deletemember('+id+');" > Yes</button>  <button type="button" class="btn btn-info" data-dismiss="modal"> No</button></div>';
     $('#deletemembermodal .modal-body').html(data);
    $('#deletemembermodal').modal('show');
  }

  function deletemember(id)
  {
    var url = "<?php echo base_url(); ?>Registration/deleteenquiry";      
      $.ajax({
          type: "POST",
          url: url,         
          data: {'id':id},
          success: function (response) { 
            
            var result=JSON.parse(response);           
            //alert(result.success);
            if(result.success == 1) 
            {
              //alert("");
              //$('#delete').modal('hide');
              window.location.reload();
            }               
          },
          error: function (req, status, error) {
              alert("Network Error!");
          }
      });
  }
</script>