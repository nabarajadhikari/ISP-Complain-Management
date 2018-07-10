
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
                  
                    <h3>Database Import and Export</h3>
            
                    <div class="clear"></div>
                </div> <!-- End .content-box-header -->
                
                <div class="content-box-content">
                <?php echo displayStatus(); ?>
                                            
                    <div><ul>
    <li> <a href="<?php echo site_url('telemarketer/dbbackup')?>/download_inline"> Download Inline</a></li>
    <li> <a href="<?php echo site_url('telemarketer/dbbackup/')?>/save_to_disc"> Save in disc</a></li>
    <li> <a href="<?php echo site_url('telemarketer/dbbackup/')?>/import"> Import From Disc</a></li>
</ul></div>                 </div> <!-- End .content-box-content -->
                
            </div> <!-- End .content-box -->
            