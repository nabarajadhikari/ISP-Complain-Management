<div id="main-content"> <!-- Main Content Section with everything -->
            
            <noscript> <!-- Show a notification if the user has disabled javascript -->
                <div class="notification error png_bg">
                    <div>
                        Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
                    Download From <a href="http://www.exet.tk">exet.tk</a></div>
                </div>
            </noscript>
            
            <!-- Page Head -->
            
            <h2></h2>
            <div class="clear"></div> <!-- End .clear -->
            
            <div class="content-box"><!-- Start Content Box -->
                
                <div class="content-box-header">
                  
                    <h3>Users</h3>
            
                    <div class="clear"></div>
                </div> <!-- End .content-box-header -->
                
                <div class="content-box-content">
                
                <?php echo displayStatus(); ?>
                    <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
                    <p><a class="button" href="<?php echo site_url('auth/create_user');?>">Create a new user</a></p>
                        <p>Below is a list of the users.</p>


<p>
                        
                        <table>
                            
                            <thead>
                              <tr>
                              <form action="<?php echo site_url('auth/index')?>" method="post">
                                <th colspan="8"><!--Email
                                <input type='text' name="email">
                                Company
                                <input type='text' name="company">
                                Department
                                <input type='text' name="department">-->
                                Group
                                <?php echo form_dropdown('group_id',$group_options,null)?>
                                <input type="submit" value="search">
                                </form>
                            </tr>
                            
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Groups</th>
                                <th>Reference</th>
                                <th>Status</th>
                                <th>Options </th> 
                            </tr>
                                
                            </thead>
                         
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        
                                        
                                        <div class="pagination">
                                           <?php //build_pagination_links($page_number, $limit, $max_results, $page_prefix, $page_suffix);?>
                                        </div> <!-- End .pagination -->
                                        <div class="clear"></div>
                                    </td>
                                </tr>
                            </tfoot>
                         
                            <tbody>
                            <?php foreach ($users as $user):?>
        
                                <tr>
            <td><?php echo $user->first_name.' '.$user->last_name;?></td>
            <td><?php echo $user->email;?></td>
            <td><?php if($user->company_id==NULL)
                       {
                         echo "Anonymous";
                      
                       }
                       else
                       {
                      echo $user->company_id;
                       }
                       ?></td>
             <td><?php if($user->department_id==NULL)
                       {
                       echo "Anonymous";
                       }
                       else
                       {
                       echo $user->department_id;
                       }
             
             ?></td>
            <td>
                <?php foreach ($user->groups as $group):?>
                    <?php echo $group->name;?><br />
                <?php endforeach?>
            </td>
             <td><?php echo $user->refrence_text;?></td>
            <td><?php if($user->groups[0]->name != 'superadmin'):?><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, 'Active') : anchor("auth/activate/". $user->id, 'Inactive');?><?php else:?>
            <?php echo ($user->active) ?  'Active': 'Inactive';?><?php endif;?></td>
            <td>
            <?php if(($user->groups[0]->name == 'superadmin') && ($this->session->userdata('user_group')=='superadmin')&& ($this->session->userdata('user_id')==$user->id)):?>
                <a href="<?php echo site_url('auth/change_password')?> " title="Change Password">Change Password</a>
            <?php elseif(($user->groups[0]->name == 'superadmin')):?>
                no options
            <?php elseif(($user->groups[0]->name != 'superadmin') && ($this->session->userdata('user_group') == 'superadmin')):?>
                <a href="<?php echo site_url('auth/edit_user/'.$user->id)?> " title="Edit"><img src="<?php echo ASPATH ; ?>/images/icons/pencil.png" alt="Edit" /></a>
                                         <a href="<?php echo site_url('auth/delete_user/'.$user->id)?>" title="Delete" onclick="return(confirm('Do you really want to delete?'))"><img src="<?php echo ASPATH ; ?>/images/icons/cross.png" alt="Delete" /></a>
            <?php elseif(!($user->groups[0]->name == 'superadmin' || $user->groups[0]->name == 'admin') && ($this->session->userdata('user_group')=='admin')):?>
                <a href="<?php echo site_url('auth/edit_user/'.$user->id)?> " title="Edit"><img src="<?php echo ASPATH ; ?>/images/icons/pencil.png" alt="Edit" /></a>
                                         <a href="<?php echo site_url('auth/delete_user/'.$user->id)?>" title="Delete" onclick="return(confirm('Do you really want to delete?'))"><img src="<?php echo ASPATH ; ?>/images/icons/cross.png" alt="Delete" /></a>
            <?php endif; ?></td>
        </tr>
        
                            <?php endforeach;?>    
                            </tbody>
                            
                        </table>
                        
                    </div> <!-- End #tab1 -->                            
                <div> <!-- End .content-box-content -->
                
            </div> <!-- End .content-box -->
            