<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Manage Clients<div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
            
                <?php echo displayStatus(); ?>
                     <a href="<?php echo site_url('admin/add_clients'); ?>" id="save">Add Clients</a>   
                        <table id="table"  style="width:740px !important;">
                              <thead>
<form action="<?php echo site_url('user/show_client')?>" method="POST">
<input type="text" name="name" placeholder="name">
<input type="text" name="address" placeholder="address">
<input type="submit" value="Search">
</form>


                                <tr>
                                   <th>Id</th> 
                                   <th>Name</th>
                                   <th>Address</th>
                                   <th>Band Width</th>
                                   <th>Ashwin</th>
                                   <th>Renew Date</th>
                                   <th>Expiry Date</th>
                                   <th>Rn</th>
                                   <th>Renew By</th>
                                   <th>Remark</th>
                                   <th>Options</th>
                                   
                                </tr>
                                
                            </thead>
                         
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        
                                        
                                        <div class="pagination">
                                           <?php build_pagination_links($page_number, $limit, $max_results, $page_prefix, $page_suffix);?>
                                        </div> <!-- End .pagination -->
                                        <div class="clear"></div>
                                    </td>
                                </tr>
                            </tfoot>
                         
                            <tbody>
                            <?php foreach($blogs as $blog):?>
                                <tr>
                                   <td><?php echo $blog->id;?></td>
                                   <td><?php echo $blog->name;?></td> 
                                   <td title="<?php echo substr($blog->address,0,150).'...';?>"><?php echo $blog->address;?></td>
                                    <td><?php echo $blog->bandwidth;?></td>
                                    <td><?php echo $blog->ashwin;?></td>
                                    <td><?php echo $blog->renew_date;?></td>
                                    <td><?php echo $blog->expiry_date;?></td>
                                    <td><?php echo $blog->rn;?></td>
                                    <td><?php echo getUser($blog->renew_by);?></td>
                                    <td><?php echo $blog->remark;?></td>
                                    <td><a href="<?php  echo site_url('user/edit_client/'.$blog->id); ?> " title="Edit"><img src="<?php echo ASPATH ; ?>/img/edit.png" alt="Edit" /></a></td>
                                    <td>
                                        <!-- Icons -->
                                        <!-- <a href="<?php   site_url('admin/edit_add/'.$blog->id); ?> " title="Edit"><img src="<?php echo ASPATH ; ?>/img/edit.png" alt="Edit" /></a>
                                         <a href="<?php echo site_url('admin/delete_information/'.$blog->id)?>" title="Delete" onclick="return(confirm('Do you really want to delete from '))"><img src="<?php echo ASPATH ; ?>/img/cancel.png" alt="Delete" /></a> 
                                        --> 
                                        </td>
                                </tr>
                            <?php endforeach;?>    
                            </tbody>
                                                         
                        </table>            
           
 </div> <!-- End .content-box -->                                 
 <!-- sidebar starts                                -->
 <div id="sidebar" class="right">
                <h2 class="ico_mug">Add</h2>
            <ul id="menu">
               
                        <li><a href="<?php echo site_url('admin/add_ad')?>">Add add</a></li>
                        <li><a href="<?php echo site_url('admin/show_add')?>">Manage add</a></li>
                    
            </ul>

</div>
<!--            sidebar ends-->                          

</div>


        