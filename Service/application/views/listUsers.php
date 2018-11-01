<div class="container-fluid">
<div align="right">
    <button class="btn btn-primary" data-toggle="modal" data-target="#adduser"><i class="fa fa-plus fa-lg"></i> Add New User</button>
</div>
<br>
<div class="col-md-12" align="center">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i> List Users</div>
          <div class="card-body text-center">
                <?php echo $this->session->flashdata('alert'); ?>
                <div class="row">
                 <div class="table-responsive content table-full-width">
                    <table id="myTable" class="table table-bordered table-striped table-hover">
                        <thead class="bg-success text-white" align="center">
                        <tr>
                            <th>#</th>
                            <th>Member Name</th>
                            <th>Contact</th>
                            <th><i class="fa fa-cog fa-spin"></i></th>
                        </tr>
                        </thead>
                        <tbody id="serviceTable">
                        <?php if (!empty($users)) {
                                foreach ($users as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value->name; ?></td>
                                        <td><?php echo $value->contact; ?></td>
                                        <td>
                                           <a href="<?php echo base_url(); ?>users/deleteuser/<?php echo $value->id; ?>" onclick="return confirm('Are You Sure.....You Want To Delete User ?')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                        </tbody>
                            <?php }}else{ ?>
                                <div class="alert alert-info"><strong>Oops!</strong> No Users to display.</div>
                            <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="adduser">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
       
        <form method="POST" action="<?php echo base_url().'users/addUser'; ?>">
        <div class="form-group">
            <label>Full Name : </label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Users Full Name" required>
        </div>

        <div class="form-group">
            <label>User Name : </label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username For Login" required>
        </div>

        <div class="form-group">
            <label>Contact : </label>
            <input type="text" class="form-control" name="contact" id="contact" placeholder="10 Digit Mobile Number" required>
        </div>

        <div class="form-group">
            <label>Temp. Password : </label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Temperory Password" required>
        </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
             <button type="submit" class="btn btn-danger">Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </form>
            
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