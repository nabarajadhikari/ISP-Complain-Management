<div id="tabledata" class="section">
            <h2 class="ico_mug">Manage Users</h2>
            <?php echo displayStatus(); ?>
            
        <table id="table"> 
            <thead>
            <tr>
                <th><input type="checkbox" class="noborder" /></th>
                <th>User/Business Name</th>
                <th>Email</th>
                <th>Groups</th>
                <th>Status</th>
                <th>Options </th> 
                
            </tr>
            </thead>
            <tbody>
            <!--<tr>
                <td class="table_check"><input type="checkbox" class="noborder" /></td>
                <td class="table_date">April 23, 2009</td>
                <td class="table_title"><a href="#">Something like post </a></td>
                <td><a href="#">Webdesign, Life, Custom</a></td>
                <td><a href="#"><img src="img/accept.jpg" alt="accepted"/></a><a href="#"><img src="img/cancel.jpg" alt="cancel"/></a><a href="#"><img src="img/folder.jpg" alt="folder"/></a><a href="#"><img src="img/edit.jpg" alt="edit"/></a></td>
                <td><span class="approved">Approved</span></td>
            </tr>-->
            <?php foreach ($users as $user):?>
        
                                <tr>
            <td class="table_check"><input type="checkbox" class="noborder" /></td>
            <td><?php echo $user->businessname?$user->businessname:$user->first_name.' '.$user->last_name;?></td>
            <td><?php echo $user->email;?></td>
           
            <td>
                <?php foreach ($user->groups as $group):?>
                    <?php echo $group->description;?><br />
                <?php endforeach?>
            </td>
             
            <td><?php if($user->groups[0]->name != 'superadmin'):?>
            <?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, 'Active') : anchor("auth/activate/". $user->id, '<span style="color:red; !important">Inactive</span>');?><?php else:?>
            <?php echo ($user->active) ?  'Active': '<span style="color:red; !important">Inactive</span>';?><?php endif;?></td>
            <td>
            <?php //if($user->groups[0]->name == 'superadmin') {?>
                <a href="<?php  echo site_url('auth/edit_user/'.$user->id)?> " title="Edit"><img src="<?php echo base_url() ; ?>assets/admin/img/edit.jpg" alt="Edit" /></a>
                <a href="<?php echo site_url('auth/delete_user/'.$user->id)?>" title="Delete" onclick="return(confirm('Do you really want to delete?'))"><img src="<?php echo base_url() ; ?>assets/admin/img/cancel.jpg" alt="Delete" /></a>
           <!-- <?php //}elseif($user->groups[0]->name == 'admin'){?>
                <a href="<?php  echo site_url('auth/edit_staff/'.$user->id)?> " title="Edit"><img src="<?php echo base_url() ; ?>assets/admin/img/edit.jpg" alt="Edit" /></a>
                <a href="<?php echo site_url('auth/delete_user/'.$user->id)?>" title="Delete" onclick="return(confirm('Do you really want to delete?'))"><img src="<?php echo base_url() ; ?>assets/admin/img/cancel.jpg" alt="Delete" /></a>
            <?php //}elseif($user->groups[0]->name == 'agent'){?>
                <a href="<?php echo site_url('auth/delete_user/'.$user->id)?>" title="Delete" onclick="return(confirm('Do you really want to delete?'))"><img src="<?php echo base_url() ; ?>assets/admin/img/cancel.jpg" alt="Delete" /></a>
            <?php //}?>  -->
            </td>
        </tr>
        
                            <?php endforeach;?>
            
            </tbody>
        </table>
        </div>