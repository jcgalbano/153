<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <h1>Edit My Information</h1>
                <?php echo form_open('',array('class'=>'form-horizontal'));?>
                    <div class="form-group">
                    <?php
                        echo form_label('First name','first_name');
                        echo form_error('first_name');
                        echo form_input('first_name',set_value('first_name',$user->first_name),'class="form-control"');
                    ?>
                    </div>
                    <div class="form-group">
                    <?php
                        echo form_label('Last name','last_name');
                        echo form_error('last_name');
                        echo form_input('last_name',set_value('last_name',$user->last_name),'class="form-control"');
                    ?>
                    </div>
                    <div class="form-group">
                    <?php
                        echo form_label('Address','address');
                        echo form_error('address');
                        echo form_input('address',set_value('address',$user->address),'class="form-control"');
                    ?>
                    </div>
                    <div class="form-group">
                    <?php
                        echo form_label('Birthday','birthday');
                        echo form_error('birthday');
                        echo form_input('birthday',set_value('birthday',$user->birthday),'class="form-control"');
                    ?>
                    </div>
                    <?php echo form_hidden('user_id',$user->id);?>
                    <?php echo form_submit('submit', 'Edit user', 'class="btn btn-primary btn-lg btn-block"');?>
                <?php echo form_close();?>
        </div>
    </div>
</div>
