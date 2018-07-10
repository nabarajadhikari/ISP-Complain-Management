<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Manage Albums</h2>
            
                <?php echo displayStatus(); ?>
                     <a href="<?php echo site_url('admin/add_album'); ?>" id="save">Add Album</a>   
                        
                        <table id="table"  style="width:740px !important;">
                            
                            <thead>
                                <tr>
                                   <th>Id</th> 
                                   <th>Title</th>
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
                                    <td><a href="<?php echo site_url('admin/show_album_details/'.$blog->id)?>"><?php echo $blog->title;?></a></td>
                                    
                                    <td><?php if($total=albumImageCount($blog->id)){?><img src="<?php echo base_url().'assets/uploads/'.getAlbumImage($blog->id) ; ?>" width="40px;" height="40px;"/><?php }else echo 'Empty';?> </td>
                                    
                                    <td>
                                        <!-- Icons -->
                                         <a href="<?php echo site_url('admin/edit_album/'.$blog->id)?> " title="Edit"><img src="<?php echo ASPATH ; ?>/img/edit.png" alt="Edit" /></a>
                                         <a href="<?php echo site_url('admin/delete_album/'.$blog->id)?>" title="Delete" onclick="return(<?php if($total) echo "confirm('Do you really want to delete album?It contains ".$total." images.')"?>)">
                                         <img src="<?php echo ASPATH ; ?>img/cancel.png" alt="Delete" /></a> 
                                         
                                        </td>
                                </tr>
                            <?php endforeach;?>    
                            </tbody>
                            
                        </table>            
           
 </div> <!-- End .content-box -->                                 
 <?php $this->load->view('admin_sidebar');?>                          

</div>


  