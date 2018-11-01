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
        <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i> Report</div>
          <div class="card-body">
            <?php echo $this->session->flashdata('alert'); ?>
                <div class="row">
                 <div class="table-responsive content table-full-width">
                    <table id="myTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-success text-white" align="center">
                        <tr>
                            <th>#</th>
                            <th>Joining Date</th>
                            <!-- <th>Service Name</th> -->
                            <th>Member Name</th>
                           <!--  <th>Business Name</th> -->
                            <!-- <th>Address</th> -->
                            <th>Mobile</th>
                            <th>Web View Count</th>
                            <th>mobile view count</th>
                            <th>call count</th>
                            
                        </tr>
                        </thead>
                        <tbody id="serviceTable">
                            <?php if (!empty($result)) {
                                foreach ($result as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value->reg_date; ?></td>
                                       <!--  <td><?php echo $value->service_name; ?></td> -->
                                        <td><?php echo $value->mem_name; ?></td>
                                       <!--  <td><?php echo $value->business_name; ?></td>
                                        <td><?php echo $value->address; ?></td> -->
                                        <td><?php echo $value->mobile_no; ?></td>
                                        <td><?php echo $value->web_view; ?></td>
                                        <td><?php echo $value->mobile_view; ?></td>
                                        <td><?php echo $value->app_call_count; ?></td>
                                       
                                    </tr>
                        </tbody>
                            <?php }}else{ ?>
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
        <h5 class="modal-title">Delete This Member?</h5>
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
    /*$("#myTable").dataTable({
        aaSorting: [[2, 'asc']],
        bPaginate: true,
        bFilter: true,
        bInfo: true,
        bSortable: true,
        bRetrieve: true,
        aoColumnDefs: [
            { "aTargets": [ 0 ], "bSortable": true },
            { "aTargets": [ 1 ], "bSortable": true },
            { "aTargets": [ 2 ], "bSortable": true },
            { "aTargets": [ 3 ], "bSortable": false }
        ]
    }); */
    $('#myTable').DataTable({"ordering": false});
});



 
</script>