<?php if (!empty($result)) {

    foreach ($result as $key => $value) { ?>

    <div class="bg-info px-5 py-2 my-0">
        <h1 style="margin-left: 2%">Enquiry Details</h1>

        <div class="container-fluid">
            <div class="card border-primary">

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-md">
                                    <h4>Member Name:</h4>
                                </div>
                                <div class="col-md">
                                    <h4><?php echo $value->mem_name; ?></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <h4>Registration Date:</h4>
                                </div>
                                <div class="col-md">
                                    <h4><?php echo $value->reg_date; ?></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <h4>Aadhar Number:</h4>
                                </div>
                                <div class="col-md">
                                    <h4><?php echo $value->aadhar_no; ?></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <h4>Blood Group:</h4>
                                </div>
                                <div class="col-md">
                                    <h4><?php echo $value->blood_group; ?></h4>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md">
                                    <h4>Business Name:</h4>
                                </div>
                                <div class="col-md">
                                    <h4><?php echo $value->business_name; ?></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <h4>Service Info:</h4>
                                </div>
                                <div class="col-md">
                                    <h4><?php echo $value->s_p_info; ?></h4>
                                </div>
                            </div>


                            <br><br>
                            <blockquote class="blockquote">
                                <h2 class="mb-0"><u>Contact Information</u></h2>
                            </blockquote>
                            <div class="row">
                                <div class="col-md">
                                    <h4>Address:</h4>
                                </div>
                                <div class="col-md">
                                    <h4><?php echo $value->address; ?></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <h4>Mobile Number:</h4>
                                </div>
                                <div class="col-md">
                                    <h4>+91 <?php echo $value->mobile_no; ?></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <h4>Landline Number:</h4>
                                </div>
                                <div class="col-md">
                                    <h4><?php echo $value->landline_no; ?></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <h4>E-Mail:</h4>
                                </div>
                                <div class="col-md">
                                    <h4><?php echo $value->email_id; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </div>