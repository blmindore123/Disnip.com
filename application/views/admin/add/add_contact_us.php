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
<?php if ($this->session->flashdata('success')) { ?>
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
            <?php if (!empty($contact_us)) { ?>Edit Contact Us Details<?php } else { ?>Add Contact Us Details<?php } ?>

        </div>
    </div>

    <div class="panel-body">
        <form <?php if (!empty($contact_us)) { ?>action="<?php echo site_url('admin/edit_contact_us'); ?>"<?php } else { ?>action="<?php echo site_url('admin/edit_contact_us'); ?>"<?php } ?> role="form" id="form1" method="post" class="validate" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label">Company Name</label>

                <input type="text" name="company_name" id="company_name" <?php if (!empty($contact_us)) { ?>value="<?php echo $contact_us[0]->company_name;
            }
            ?>" class="form-control" data-validate="required" placeholder="Company Name" />
            </div>
            <div class="form-group">
                <label class="control-label">Company Email</label>

                <input type="text" name="company_email" id="company_email" <?php if (!empty($contact_us)) { ?>value="<?php echo $contact_us[0]->company_email;
                   }
            ?>" class="form-control" data-validate="required" placeholder="coomapny Email" />
            </div>
            <div class="form-group">
                <label class="control-label">Contact No</label>

                <input type="text" name="contact_no" id="contact_no" <?php if (!empty($contact_us)) { ?>value="<?php echo $contact_us[0]->contact_no;
                   }
            ?>" class="form-control" data-validate="required" placeholder="Contact Number" />
            </div>
            <div class="form-group">
                <label class="control-label">Company Address</label>

                <input type="text" name="company_address" id="company_address" <?php if (!empty($contact_us)) { ?>value="<?php echo $contact_us[0]->company_address;
                   }
            ?>" class="form-control" data-validate="required" placeholder="Company Address" />
            </div>
            <div class="form-group">
                <label class="control-label">Content</label>
                <textarea class="form-control ckeditor" rows="10" name="contact_us_details"  data-validate="required"  placeholder="Contact us details "><?php if (!empty($contact_us)) { ?> <?php echo $contact_us[0]->contact_us_details;
                   }
            ?></textarea>
            </div>

            <div class="form-group">
<?php if (!empty($contact_us)) { ?>
                    <input type="hidden" name="contact_us_id" value="<?php echo $contact_us[0]->contact_us_id; ?>">
<?php } ?>
                <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
