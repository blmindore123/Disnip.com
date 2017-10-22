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
             <?php if(!empty($slider_details)){ ?>Edit Slider<?php } else { ?>Add Slider<?php } ?>
             
        </div>
    </div>
        
    <div class="panel-body">
        <form <?php if(!empty($slider_details)){ ?>action="<?php echo site_url('admin/edit_slider'); ?>"<?php } else { ?>action="<?php echo site_url('admin/add_slider'); ?>"<?php } ?> role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label">Slider Title</label>
                <input type="text" name="slider_content_title" <?php if(!empty($slider_details)){ ?>value="<?php echo $slider_details[0]->slider_content_title; } ?>" class="form-control" data-validate="required" placeholder="Slider Title" />
            </div>
            
            <div class="form-group">
                <label class="control-label">Slider Other Content</label>
                <input type="text" name="slider_content_other" <?php if(!empty($slider_details)){ ?>value="<?php echo $slider_details[0]->slider_content_other; } ?>" class="form-control" data-validate="required" placeholder="Slider Other Content" />
            </div>
            
            <div class="form-group">
                <label class="control-label">Slider Main Content</label>
                <input type="text" name="slider_content" <?php if(!empty($slider_details)){ ?>value="<?php echo $slider_details[0]->slider_content; } ?>" class="form-control" data-validate="required" placeholder="Slider Main Content" />
            </div>
            
            <div class="form-group">
               <label class="control-label">Slider Image</label>
               <?php if(!empty($slider_details) && !empty($slider_details[0]->slider_image)){ ?>
               <br>
               <img src="<?php echo base_url('uploads/slider').'/'.$slider_details[0]->slider_image; ?>" height="90" width="90">
               
               <input type="hidden" name="slider_image" value="<?php echo $slider_details[0]->slider_image; ?>">
               <?php } ?>
               <input type="file" accept="image/*" name="slider_image" class="form-control" <?php if(!empty($slider_details) && !empty($slider_details[0]->slider_image)){ } else { ?>data-validate="required"<?php } ?> />
           </div>
            
          <br>
            <div class="form-group">
                <?php if(!empty($slider_details)){ ?>
                    <input type="hidden" name="slider_id" value="<?php echo $slider_details[0]->slider_id; ?>">
                <?php } ?>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
