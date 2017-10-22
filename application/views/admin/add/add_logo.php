<?php if($this->session->flashdata('error')){ ?>
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
<?php if($this->session->flashdata('success')){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong><?php echo $this->session->flashdata('success'); ?></strong>
        </div>
    </div>
</div>
<?php } ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
             <?php if(!empty($logo_details)){ ?>Edit Logo<?php } else { ?>Add Logo<?php } ?>
             
        </div>
    </div>
        
    <div class="panel-body">
        <form <?php if(!empty($logo_details)){ ?>action="<?php echo site_url('admin/edit_logo'); ?>"<?php } else { ?>action="<?php echo site_url('admin/add_logo'); ?>"<?php } ?> role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
            
            <div class="form-group">
               <label class="control-label">App Logo</label>
               <?php if(!empty($logo_details) && !empty($logo_details[0]->app_logo)){ ?>
               <br>
               <img src="<?php echo base_url('uploads/logo').'/'.$logo_details[0]->app_logo; ?>" height="90" width="90">
               
               <input type="hidden" name="app_logo" value="<?php echo $logo_details[0]->app_logo; ?>">
               <?php } ?>
               <input type="file" accept="image/*" name="app_logo" class="form-control" <?php if(!empty($logo_details) && !empty($logo_details[0]->app_logo)){ } else { ?>data-validate="required"<?php } ?> />
           </div>
           <br>
            <div class="form-group">
               <label class="control-label">Website Logo</label>
               <?php if(!empty($logo_details) && !empty($logo_details[0]->website_logo)){ ?>
               <br>
               <img src="<?php echo base_url('uploads/logo').'/'.$logo_details[0]->website_logo; ?>" height="90" width="90">
               
               <input type="hidden" name="website_logo" value="<?php echo $logo_details[0]->website_logo; ?>">
               <?php } ?>
               <input type="file" accept="image/*" name="website_logo" class="form-control" <?php if(!empty($logo_details) && !empty($logo_details[0]->website_logo)){ } else { ?>data-validate="required"<?php } ?> />
           </div>
             
          <br>
            <div class="form-group">
                <?php if(!empty($logo_details)){ ?>
                    <input type="hidden" name="logo_id" value="<?php echo $logo_details[0]->logo_id; ?>">
                <?php } ?>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
