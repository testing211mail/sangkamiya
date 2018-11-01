<div class="container-fluid">
<!-- <div align="right">
    <a class="btn btn-primary" href="<?php echo base_url(); ?>members/addMember"><i class="fa fa-plus"></i> Add New Member</a>
</div> -->
<br>
<div class="col-md-12" align="center">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i> List Members</div>
          <div class="card-body">
            <?php echo $this->session->flashdata('alert'); ?>
                <div class="row">
                 <div class="table-responsive content table-full-width">
                    <table id="myTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-success text-white" align="center">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Conmment</th>
                        </tr>
                        </thead>
                        <tbody id="serviceTable">
                            <?php if (!empty($result)) {
                                foreach ($result as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value->name; ?></td>
                                        <td><?php echo $value->contact; ?></td>
                                        <td><?php echo $value->comment; ?></td>
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

<script type="text/javascript">
    $(document).ready(function() {
    $('#myTable').DataTable({"ordering": false});
});
</script>