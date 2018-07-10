<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Manage Testimonial <div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
            
                <?php echo displayStatus(); ?>
                     <a href="<?php echo site_url('admin/add_testimonial'); ?>" id="save">Add Testimonial</a>   
                        
                        <table id="table"  style="width:740px !important;">
                            
                            <thead>
                                <tr>
                                   <th>Id</th> 
                                   <th>Title</th>
                                   <th>Details</th>
                                   <th>Name</th>
                                   <th>Subscript</th>
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
                                   <td><?php echo $blog->title;?></td>
                                   <td title="<?php echo $blog->description;?>"><?php echo word_limiter($blog->description,5,'...');?></td> 
                                    <td><?php echo $blog->name;?></td>
                                    <td><?php echo $blog->subscript;?></td>
                                    <td>
                                        <!-- Icons -->
                                         <a href="<?php echo site_url('admin/edit_testimonial/'.$blog->id)?> " title="Edit"><img src="<?php echo ASPATH ; ?>/img/edit.png" alt="Edit" /></a>
                                         <a href="<?php echo site_url('admin/delete_testimonial/'.$blog->id)?>" title="Delete" onclick="return(<?php if($total) echo "confirm('Do you really want to delete album?It contains ".$total." images.')"?>)">
                                         <img src="<?php echo ASPATH ; ?>img/cancel.png" alt="Delete" /></a> 
                                         
                                        </td>
                                </tr>
                            <?php endforeach;?>    
                            </tbody>
                            
                        </table>            
           
 </div> <!-- End .content-box -->                                 
 <?php $this->load->view('admin_sidebar');?>                          

</div>


  