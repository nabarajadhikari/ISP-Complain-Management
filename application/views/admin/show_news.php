<div id="shortcuts" class="clearfix" style="width:740px !important;">
             <h2 class="ico_mug">Manage News <div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
            
                <?php echo displayStatus(); ?>
                     <a href="<?php echo site_url('admin/add_news'); ?>" id="save">Add news</a>   
                      <a href="<?php echo site_url('admin/add_slider_news'); ?>" id="save">Add Slider</a>  
                        <table id="table"  style="width:740px !important;">
                              <thead>
                              <tr colspan='6'><div style=""><a href="<?php echo site_url('admin/show_news'); ?>" id="save" style="<?php if($page_suffix==null) echo 'background:#4700ae;'; else 'background:#4780ae;'?>">All News</a>\<a href="<?php echo site_url('admin/show_news/0/0/1'); ?>" id="save" style="<?php if($page_suffix==1) echo 'background:#4700ae;'; else 'background:#4780ae;'?>">Slider News</a>\<a href="<?php echo site_url('admin/show_news/0/0/2'); ?>" id="save" style="<?php if($page_suffix==2) echo 'background:#4700ae;'; else 'background:#4780ae;'?>">Popular News</a>\<a href="<?php echo site_url('admin/show_news/0/0/0'); ?>" id="save" style="<?php if($page_suffix==0 && $page_suffix!=null) echo 'background:#4700ae;'; else 'background:#4780ae;'?>">Latest News</a></div></tr>
                                <tr>
                                   <th>Id</th> 
                                   <th>Type</th>
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
                                   <td><?php if($blog->flag==0)echo 'Latest';elseif($blog->flag==1)echo 'Slider';elseif($blog->flag==2) echo 'Popular'?></td>
                                    <td><?php echo $blog->title;?></td>
                                    <td><?php echo substr($blog->description,0,150).'...';?></td>
                                    <td><img src="<?php echo base_url().'assets/uploads/'.$blog->image?>" height="30px" width="30px"  alt="No Image"></img></td>
                                    <td>
                                        <!-- Icons -->
                                         <a href="<?php if($blog->flag==1)echo  site_url('admin/edit_slider_news/'.$blog->id);elseif($blog->flag==0 || $blog->flag==2) echo site_url('admin/edit_news/'.$blog->id) ?> " title="Edit"><img src="<?php echo ASPATH ; ?>/img/edit.png" alt="Edit" /></a>
                                         <a href="<?php echo site_url('admin/delete_information/'.$blog->id)?>" title="Delete" onclick="return(confirm('Do you really want to delete from <?php echo getInformationType($blog->information_type);?>?'))"><img src="<?php echo ASPATH ; ?>/img/cancel.png" alt="Delete" /></a> 
                                         
                                        </td>
                                </tr>
                            <?php endforeach;?>    
                            </tbody>
                                                         
                        </table>            
           
 </div> <!-- End .content-box -->                                 
 <?php $this->load->view('admin_sidebar');?>                          

</div>


        