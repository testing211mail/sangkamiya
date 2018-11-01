<div class="container col-md-10" align="center">
    <div class="card border-primary">
        <div class="card-header bg-primary text-white"> <i class="fa fa-table"></i>Menu List</div>
          <?php echo $this->session->flashdata('alert'); ?>
          <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addmenu"><i class="fa fa-plus fa-lg"></i> Add New Menu</button>
                        </div>
                    </div>

                </div>

                 <div class="table-responsive content table-full-width">
                    <table id="myTable" class="table table-bordered table-striped table-condensed table-hover">
                        <thead class="bg-danger text-white" align="center">
                        <tr>
                            <th>#</th>
                            <th>Menu Name</th>
                            <th><i class="fa fa-lg fa-cog fa-spin"></i></th>
                        </tr>
                        </thead>
                        <tbody id="menutable">

                          <?php if (!empty($result)) {
                                foreach ($result as $key => $value) { ?>
                                    <tr class="text-center">

                                        <td><?php echo $key+1; ?></td>
                                        <td><?php echo $value->menu_name; ?></td>
                                        <td><button onclick="edit_menu(<?php echo $value->menu_id;?>)" class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></button></td>
                                        
                                    </tr>
                        </tbody>
                            <?php }}else{ ?>
                                <div class="alert alert-info"><strong>Oops!</strong> No menu to display.</div>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<!-- The menu Modal -->
<div class="modal fade" id="addmenu">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Menu</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
       
        <form method="POST" action="<?php echo base_url().'menu/addMenu'; ?>">     
        <div class="form-group">
            <label>Menu Name : </label>
            <input type="text" class="form-control" name="menu_name" id="menu_name" placeholder="" required>
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


  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Edit Menu</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="menu_id"/>
          <div class="form-body">
            
            <div class="form-group">
              <label class="control-label col-md-3">New Name</label>
              <div class="col-md-9">
                <input name="menu_name_" placeholder="new menu name" id="menu_name_" class="form-control" type="text">
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->



  <script type="text/javascript">


    // Load the Google Transliteration API
  google.load("elements", "1", {
        packages: "transliteration"
      });

  function onLoad() {
    var options = {
      sourceLanguage: 'en',
      destinationLanguage: ['mr'],
      shortcutKey: 'ctrl+m',
      transliterationEnabled: true
    };
    // Create an instance on TransliterationControl with the required
    // options.
    var control = new google.elements.transliteration.TransliterationControl(options);
    // Enable transliteration in the textfields with the given ids.
    var ids = ["menu_name","menu_name_"];
    control.makeTransliteratable(ids);
    // Show the transliteration control which can be used to toggle between
    // English and Hindi and also choose other destination language.
    control.showControl('translControl');
  }
  google.setOnLoadCallback(onLoad);

  	function edit_menu(id)
    {
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url().'menu/getMenuDetails/'; ?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
        	console.log(data);

            $('[name="menu_id"]').val(data.menu_id);
            $('[name="menu_name_"]').val(data.menu_name);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Something Went Wrong');
        }
    });
    }



    function save()
    {
      var url;

        url = "<?php echo base_url().'menu/saveMenuDetails'; ?>";


       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error while Updating data');
            }
        });
    }
  </script>