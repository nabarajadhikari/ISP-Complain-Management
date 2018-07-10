<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Manage Image</h2>
            
                <?php echo displayStatus(); ?>
                     <a href="<?php echo site_url('admin/add_image'); ?>" id="save">Add Image</a>   
                       <?php foreach($categories as $category){?>
                         <a href="<?php echo site_url('admin/show_other_image/'.$category->id); ?>" class="button">Show <?php echo $category->name?></a>   
                       <?php }?> 
                        <table id="table"  style="width:640px !important;">
                            
                            <thead>
                                <tr>
                                   <th>Id</th> 
                                   <th>Category</th>
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
                            <?php foreach($images as $image):?>
                                <tr>
                                   <td><?php echo $image->id;?></td> 
                                    <td><?php echo getCategory($image->category_id);?></td>
                                    <td><img src="<?php echo base_url().'assets/uploads/'.$image->image_name;?>" height="50px" width="50px"></img></td> 
                                    <td>
                                        <!-- Icons -->
                                         <!--<a href="<?php echo site_url('admin/edit_event/'.$image->id)?> " title="Edit"><img src="<?php echo ASPATH ; ?>/images/icons/pencil.png" alt="Edit" /></a>-->
                                         <a href="<?php echo site_url('admin/delete_image/'.$image->id)?>" title="Delete" onclick="return(confirm('Do you really want to delete?.!Be suer,all image inside the Gallery will be deleted'))"><img src="<?php echo ASPATH ; ?>/images/icons/cross.png" alt="Delete" /></a> 
                                    </td>
                                </tr>
                            <?php endforeach;?>        
                            </tbody>
                            
                        </table>            
           
 </div> <!-- End .content-box -->                                 
 <?php $this->load->view('admin_sidebar');?>                          

</div>


  
