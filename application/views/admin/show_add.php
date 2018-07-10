<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Manage News<div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
            
                <?php echo displayStatus(); ?>
                     <a href="<?php echo site_url('admin/add_ad'); ?>" id="save">Add Add</a>   
                        <table id="table"  style="width:740px !important;">
                              <thead>
                                <tr>
                                   <th>Id</th> 
                                   <th>Link</th>
                                   <th>Title</th>
                                   <th>Description</th>
                                   <th>Image</th>
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
                                   <td><?php echo $blog->link;?></td>
                                    <td><?php echo $blog->title;?></td>
                                    <td><?php echo substr($blog->description,0,150).'...';?></td>
                                    <td><img src="<?php echo base_url().'assets/uploads/'.$blog->image?>" height="30px" width="30px"  alt="No Image"></img></td>
                                    <td>
                                        <!-- Icons -->
                                         <a href="<?php   site_url('admin/edit_add/'.$blog->id); ?> " title="Edit"><img src="<?php echo ASPATH ; ?>/img/edit.png" alt="Edit" /></a>
                                         <a href="<?php echo site_url('admin/delete_information/'.$blog->id)?>" title="Delete" onclick="return(confirm('Do you really want to delete from <?php echo getInformationType($blog->information_type);?>?'))"><img src="<?php echo ASPATH ; ?>/img/cancel.png" alt="Delete" /></a> 
                                         
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


        