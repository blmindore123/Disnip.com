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
            Logo List
        </div>
      <div class="panel-options">
            
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
                    <!--<th>App Logo</th>
                    --><th>Website Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
			<tbody>
				<?php
                               
                   $logo_path = logo.'/';?> 	
                <?php if (!empty($logo_list)) {
                    $n = 1;
                    foreach ($logo_list as $value) {
                        ?>
                        <tr>
                            <td style="width: 20%"><?php echo $n; ?></td>
                            
                          <!-- <td><img src="<?php echo $logo_path.$value->app_logo; ?>" height="112" width="112"</td>-->
                            <td><img src="<?php echo  $logo_path.$value->website_logo; ?>" height="112" width="112"</td>
                           
                            <td style="width: 25%">
                               
                            
                        <a href="<?php echo site_url('admin/edit_logo').'/'.$value->logo_id; ?>" class="btn btn-secondary btn-sm btn-icon icon-left" >Edit</a>
                                                       &nbsp;
                               
                            </td>
                        </tr>
                <?php $n = $n + 1; } } ?>
            </tbody>
        </table>

    </div>

</div>