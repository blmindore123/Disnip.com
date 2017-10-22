<?php if ($this->session->flashdata('status')) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->flashdata('status'); ?></strong>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($this->session->flashdata('error')) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
            </div>
        </div>
    </div>
<?php } ?>
<div class="panel panel-default">

    <div class="panel-heading">
        <div class="panel-title">
            User Contact List
        </div>
       
    </div>

    <div id="user_list" class="panel-body">
        <script type="text/javascript">
            jQuery(document).ready(function ($)
            {
                $("#example-1").dataTable({
                    aLengthMenu: [
                        [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                    ]
                });
            });
        </script>

        <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>S. No.</th>
                    <th>User Name</th>
                    <th>Contact No</th>
                    <th>Email ID</th>
                    <th>Subject</th>
                    <th>Demand</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($contact_user)) {
                    $n = 1;
                    foreach ($contact_user as $value) {
                        ?>
                        <tr>
                            <td style="width: 2%"><?php echo $n; ?></td>
                            <td><?php echo $value->contact_user_name; ?></td>
                            <td><?php echo $value->user_contact_phone; ?></td>
                            <td><?php echo $value->user_contact_subject; ?></td>
                           <td><?php echo $value->user_contact_subject; ?></td>
                            <td><?php echo $value->user_contact_msg; ?></td>
                          
                        </tr>
                        <?php
                        $n = $n + 1;
                    }
                }
                ?>
            </tbody>
        </table>

    </div>

</div>