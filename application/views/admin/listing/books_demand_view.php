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
            Books On Demand
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
                    <th>Demand</th>
                    <th>Condition</th>
                    <th>Language</th>
                    <th>Address</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($books_on_demand)) {
                    $n = 1;
                    foreach ($books_on_demand as $value) {
                        ?>
                        <tr>
                            <td style="width: 2%"><?php echo $n; ?></td>
                            <td><?php echo $value->booksondemand_FirstName; ?></td>
                            <td><?php echo $value->booksondemand_phone; ?></td>
                            <td><?php echo $value->booksondemand_email; ?></td>
                           <td><?php echo $value->booksondemand_msg; ?></td>
                           <td><?php echo $value->books_conditions; ?></td>
                            <td><?php echo $value->books_language; ?></td>
                           <td><?php echo $value->shipping_address; ?></td>
                          
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