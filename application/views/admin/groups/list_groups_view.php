<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-lg-12" style="margin-top: 10px;">
            <?php
            if(!empty($groups))
            {
                echo '<table class="table table-hover table-bordered table-condensed">';
                echo '<tr><td>ID</td><td>Group name</td></td><td>Group description</td>';
                foreach($groups as $group)
                {
                    echo '<tr>';
                    echo '<td>'.$group->id.'</td><td>'.anchor('admin/users/index/'.$group->id,$group->name).'</td><td>'.$group->description;
                    if(!in_array($group->name, array('admin','members'))) echo ' '.anchor('admin/groups/delete/'.$group->id,'<span class="glyphicon glyphicon-remove"></span>');
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
            ?>
        </div>
    </div>
</div>