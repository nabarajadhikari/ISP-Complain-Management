<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Manage Menu Content</h2>
            
                <?php echo displayStatus(); ?>
                        <table id="table"  style="width:740px !important;">
                            
                            <thead>
                                <tr>
                                   <th>Id</th> 
                                   <th>Menu</th>
                                   <th>Title</th>
                                   <th>Content</th>
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
                            <?php foreach($menu_contents as $content):?>
                                <tr>
                                   <td><?php echo $content->id;?></td>
                                   <td><?php echo $content->menu;?></td>
                                   <td><?php echo $content->title;?></td>
                                   <td title="<?php echo $content->description?>"><?php echo word_limiter($content->description,6,'..');?></td> 
                                    <td>
                                        <!-- Icons -->
                                         <a href="<?php echo site_url('admin/edit_menu_content/'.$content->id)?> " title="Edit"><img src="<?php echo ASPATH ; ?>/img/edit.png" alt="Edit" /></a>
                                    <!--     <a href="<?php echo site_url('admin/delete_menu_content/'.$content->id)?>" title="Delete" onclick="return(confirm('Do you really want to delete?.!Be suer,all image inside the Gallery will be deleted'))"><img src="<?php echo ASPATH ; ?>/images/icons/cross.png" alt="Delete" /></a> 
                                    --></td>
                                </tr>
                            <?php endforeach;?>        
                            </tbody>
                            
                        </table>            
           
 </div> <!-- End .content-box -->                                 
 <?php $this->load->view('admin_sidebar');?>                          

</div>


  
