<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Manage Complain Type<div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
            
                <?php echo displayStatus(); ?>
                     <a href="<?php echo site_url('admin/add_complain_type'); ?>" id="save">Add Complain Type</a>   
                        <table id="table"  style="width:740px !important;">
                              <thead>
                                <tr>
                                   <th>Id</th> 
                                   <th>Name</th>
                                   <th>Desc</th>
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
                                   <td title="<?php echo $blog->desc;?>"><?php echo substr($blog->desc,0,150).'...';?></td>
                                    <td><a href="<?php  echo site_url('admin/edit_complain_type/'.$blog->id); ?> " title="Edit"><img src="<?php echo ASPATH ; ?>/img/edit.png" alt="Edit" /></a>
                                    <a href="<?php echo site_url('admin/delete_complain_type/'.$blog->id)?>" title="Delete" onclick="return(confirm('Do you really want to delete from '))"><img src="<?php echo ASPATH ; ?>/img/cancel.png" alt="Delete" /></a> 
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
               
                        <li><a href="<?php echo site_url('admin/add_complain_type')?>">Add Complain Type</a></li>
                        <li><a href="<?php echo site_url('admin/show_complain_type')?>">Manage Complain Type</a></li>
                    
            </ul>

</div>
<!--            sidebar ends-->                          

</div>


        