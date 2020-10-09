<!-- Begin Page Content -->
<div class="container-fluid">

      <div class='row'>
            <div class='col-md-12'>
                  <div class="card shadow">
                        <div class="card-header py-3">
                              <h1><?php echo lang('edit_group_heading'); ?></h1>
                              <p><?php echo lang('edit_group_subheading'); ?></p>
                        </div>
                        <div class="card-body">
                              <div id="infoMessage"><?php echo $message; ?></div>

                              <?php echo form_open(current_url()); ?>

                              <p>
                                    <?php echo lang('edit_group_name_label', 'group_name'); ?> <br />
                                    <?php echo form_input($group_name); ?>
                              </p>

                              <p>
                                    <?php echo lang('edit_group_desc_label', 'description'); ?> <br />
                                    <?php echo form_input($group_description); ?>
                              </p>

                              <p><?php echo form_submit('submit', lang('edit_group_submit_btn'), 'class="btn btn-primary"'); ?></p>

                              <?php echo form_close(); ?>
                        </div>
                  </div>
            </div>
      </div>
</div>