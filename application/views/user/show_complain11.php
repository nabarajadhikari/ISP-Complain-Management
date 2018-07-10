<html>
<head><title>Welcome Page</title>
 <script type="text/javascript" src="<?php echo base_url() ; ?>assets/admin/js/jquery-1.3.2.min.js"></script>
 <style type="text/css">
 #success{margin:-px 0px;border:1px solid #b2dc4d;color:#000000;font-family:"Arial", Arial, sans-serif;font-size:12px;background:#cce297;font-weight:700;padding:5px;-moz-border-radius:3px;-webkit-border-radius: 3px;}
#fail{margin:5px 0px;border:1px solid #c82820;color:#000000;font-family:"Arial", Arial, sans-serif;font-size:12px;font-weight:700;background:#e7928d;padding:5px;-moz-border-radius:3px;-webkit-border-radius: 3px;}
#urgent{margin:5px 0px;border:1px solid #c82820;color:#000000;font-family:"Arial", Arial, sans-serif;font-size:12px;font-weight:700;background:#ffc000;padding:5px;-moz-border-radius:3px;-webkit-border-radius: 3px;}
#warning{margin:5px 0px;border:1px solid #efdc90;color:#000000;font-family:"Arial", Arial, sans-serif;font-size:12px;font-weight:700;background:#fffecc;padding:5px;-moz-border-radius:3px;-webkit-border-radius: 3px;}
#processing{margin:5px 0px;border:1px solid #3300CC;color:#000000;font-family:"Arial", Arial, sans-serif;font-size:12px;font-weight:700;background:#0066FF;padding:5px;-moz-border-radius:3px;-webkit-border-radius: 3px;}

 </style>
       
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#load').load("<?php $page_number=$page_number?$page_number:1;echo site_url('welcome/autolode/'.$page_number.'/'.$limit)?>").fadeIn("slow");
}, 10000); // refresh every 10000 milliseconds

</script>

</head>
<body>
<div id="shortcuts" class="clearfix">
             
                <?php echo displayStatus(); ?>
                    <a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a>
            <br/>     
                            <div id='load'>
                            <?php $this->load->view('user/flash_div_user',$data);?>
                           </div> 
                            <div class="pagination">
                                           <?php //build_pagination_links($page_number, $limit, $max_results, $page_prefix, $page_suffix);?>
                                        </div> <!-- End .pagination -->
                            <div class="clear"></div>
                                       
           
 </div> 

</div>
</body>
</html>