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
                  
                    <h3>Manage Albums</h3>
            
                    <div class="clear"></div>
                </div> <!-- End .content-box-header -->
                
                <div class="content-box-content">
                
                <?php echo displayStatus(); ?>
                    <div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
                        
                     <div> <a href="<?php echo site_url('admin/add_album_image/'.$album_id); ?>" class="button">Add Album Image</a>    </div>
                        
<head>
<style type="text/css">
#wrap {
    width:100%;
}
#wrap:after {
    /* Prevent wrapper from shrinking height, 
    see http://www.positioniseverything.net/easyclearing.html */
    content: ".";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
}
#wrap .container {
    float: left;
    width:108px;
    height: 108;
    padding: 4px;
    
}
</style>
</head>
                        <div id="wrap">
                            <?php foreach($blogs as $blog):?>
                            <div class="container">
                                <div style="width:100px;height:80px;background:#CCCCCC; padding: 4px;">
                                    <img src="<?php echo base_url().'assets/uploads/'.$blog->image_name?>" width="100px;" height="100px;"/> 
                                </div>
                                <div style="width:100px;height:20px;float:left;background: blue; padding: 4px;">
                                    <div style="width:90%;float: left;">
                                    <marquee
accesskey="key"
behavior="slide" 
contenteditable="false" 
datafld="column name"
dataformatas="text" 
direction="left"
dir="rtr"
disabled="true"
hidefocus="false"
id="unique alphanumeric identifier"
language="javascript"
loop="infinite"
scrollamount="12px"
scrolldelay="400"
style="color:white;" 
unselectable="off"
tabindex="1"  
truespeed="true"
unselectable="off" 

width="90%"><?php echo $blog->image_name?></marquee></div>
                                    <div style="width:10%;float:right;"><a href="<?php echo site_url('admin/delete_image/'.$blog->id)?>" title="Delete" onclick="return(confirm('Do you really want to delete image from album: <?php echo getAlbumName($album_id);?>?'))"><img src="<?php echo ASPATH ; ?>/images/icons/cross.png" alt="Delete" /></a></div> 
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <div class="pagination">
                                           <?php build_pagination_links($page_number, $limit, $max_results, $page_prefix, $page_suffix);?>
                        </div> 
                    </div> <!-- End #tab1 -->                            
                <div> <!-- End .content-box-content -->
                
            </div> <!-- End .content-box -->
            