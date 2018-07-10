<div id="panels" class="panel photo left" style="width:740px !important;">
             <!--<h2 class="ico_mug">Manage Image</h2> -->
            
                <?php echo displayStatus(); ?>
<!--<div class="panel photo left"> -->
                <h2 class="ico_mug">Photo gallery</h2>
                <ul class="clearfix">
                <?php foreach($blogs as $blog):?>
                    <li><img src="<?php echo base_url().'assets/uploads/'.$blog->image_name?>" alt="photo" height="150px" width="150px"/><span><a href="#"><img src="<?php echo base_url().'assets/admin/'?>img/accept.jpg" alt="accept"/></a><a href="#"><img src="<?php echo base_url().'assets/admin/'?>img/cancel.jpg"  alt="deny"/></a></span></li>
                <?php endforeach;?>
                </ul> <br/>
                <button>Add photo</button>
            <!--</div><!-- end #photo -->
            
            
 </div> <!-- End .content-box -->                                 
 <?php $this->load->view('admin_sidebar');?>                          

</div>           




