<div class="container-fluid">
<br>
<?php  $this->session->flashdata('alert'); ?>
<div class="col-md-12" align="center">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i> List Enquiries</div>
          <div class="card-body">
                <div class="row text-center">
                 <div class="table-responsive content table-full-width">
                    <table id="myTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-success text-white">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th><i class="fa fa-cog fa-spin"></i></th>
                        </tr>
                        </thead>
                        <tbody id="serviceTable">
                            <?php if (!empty($result)) {
                                foreach ($result as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value->name; ?></td>
                                        <td><?php echo $value->contact; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>enquiries/removeEnquiry/<?php echo $value->id; ?>" onclick="return confirm('Are You Sure.....You Want To Delete Enquiry ?')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                        </tbody>
                            <?php }}else{ ?>
                                <div class="alert alert-info"><strong>Oops!</strong> No Enquiries to display.</div>
                            <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
    $('#myTable').DataTable({"ordering": false});
});
</script>