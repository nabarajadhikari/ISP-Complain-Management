
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Toshiba Leading Innovation</title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/user/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url() ; ;?>assets/user/facebox/facebox.css" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>assets/user/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url() ; ?>assets/user/facebox/facebox.js"></script>



<!--<script type="text/javascript" src="<?php echo base_url();?>assets/user/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/user/js/jquery.pikachoose.full.js"></script>-->
<!--<script language="javascript">
		$(document).ready(
			function (){
				$("#pikame").PikaChoose();
			});
</script>-->


<!--<script type="text/javascript" src="<?php //echo base_url();?>assets/user/scroll/jquery.tinyscrollbar.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$('#scrollbar1').tinyscrollbar();	
		});
	</script>-->


<style type="text/css">
		
			.boxgrid{ 
				width: 94px; 
				height: 44px; 
				float:left; 
				background:#161613; 
				overflow: hidden; 
				position: relative; 
				}

			.boxgrid p{
				color:#FFF;
				font-weight:bold;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 11px;
				text-align: center;
				margin-top: 5px;
				}
				
			.boxcaption{ 
				float: left; 
				position: absolute; 
				background: #000; 
				height: 100px; 
				width: 100%; 
				opacity: .6; 
				/* For IE 5-7 */
				filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
				/* For IE 8 */
				-MS-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
 				}
 			.captionfull .boxcaption {
 					top: 100px;
 					left: 0;
 				}
 			.caption .boxcaption {
 					top: 0;
 					left: 0;
 				}
				
		</style>
		
		<script type="text/javascript">
		function runScript(e) {
    if (e.keyCode == 13) {
        document.forms["searchForm"].submit();
        
    }}
			$(document).ready(function(){

				//Full Caption Sliding (Hidden to Visible)
				$('.boxgrid.captionfull').hover(function(){
					$(".cover", this).stop().animate({top:'20px'},{queue:false,duration:160});
				}, function() {
					$(".cover", this).stop().animate({top:'100px'},{queue:false,duration:160});
				});
				
			
			});
			$(document).click(function(event) {
    if ( !$(event.target).hasClass('section-utbox_p')) {
         $("#section-utbox_p").hide();
    }
});
		
function suggest(inputString){//alert(inputString);
    if(inputString.length == 0) {
        $('#suggestions').fadeOut();
    } else {
	if(inputString.length>1){
    $.ajax({
      url: "<?php echo base_url(); ?>index.php/autocomplete/lookup2",
      data: 'act=autoSuggestUser&queryString='+inputString,
      success: function(msg){
              if(msg.length >0) {
                $('#suggestions').fadeIn();
                $('#suggestionsList').html(msg);
                $('#country').removeClass('load');
            }
      }
    });
    }}
}
    function fill(thisValue) {
    $('#country').val(thisValue);
    setTimeout("$('#suggestions').fadeOut();", 600);
}
function fillId(thisValue) {
    $('#country_id').val(thisValue);
    setTimeout("$('#suggestions').fadeOut();", 600);
}

</script>

<script>
function suggest1(inputString){//alert(inputString);
    if(inputString.length == 0) {
        $('#suggestions1').fadeOut();
    } else {
	if(inputString.length>1){
    $.ajax({
      url: "<?php echo base_url(); ?>index.php/autocomplete/lookup3",
      data: 'act=autoSuggestUser&queryString='+inputString,
      success: function(msg){
              if(msg.length >0) {
                $('#suggestions1').fadeIn();
                $('#suggestionsList1').html(msg);
                $('#country1').removeClass('load');
            }
      }
    });
    }
	}
}
    function fill1(thisValue) {
    $('#country1').val(thisValue);
    setTimeout("$('#suggestions1').fadeOut();", 600);
}
function fillId1(thisValue) {
    $('#country_id1').val(thisValue);
    setTimeout("$('#suggestions1').fadeOut();", 600);
}

</script>
<script>
$(document).ready(function(){//$('#select_retail').hide();
   // $("#scroller_test").hide();
    $(document).keyup(function(event) {
    if(event.which === 27) {
        $('#scroller_test').hide();
        $("#rightcolumn").show();
        $(".slide-out-div").show();
    }
});
    
});

function show_scroller(){
    $("#scroller_test").show();
	 $("#rightcolumn").hide();
	  $(".slide-out-div").hide();
	 
	
}
function hide_scroller(){
    $("#scroller_test").hide();
}
</script>
<link href="<?php echo base_url();?>assets/user/css/jquery.treeview.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/user/css/1screen.css" type="text/css" media="all" />
<script src="<?php echo base_url();?>assets/user/js/jquery.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/user/style.css" type="text/css" />    
<link href="<?php echo base_url();?>assets/user/css/tabslide.css" rel="stylesheet" type="text/css" media="all" />


    <style type="text/css" media="screen">
    
    .slide-out-div {
    width: 225px;
	position:fixed !important;
    height: auto !important;
    background-image: url(<?php echo base_url();?>assets/user/images/browse_bg.png);
	
    border: 1px solid #CCC;
    }
    
    </style>

    <script src="<?php echo base_url();?>assets/user/js/jquery.tabSlideOut.v1.3.js"></script>
         
         <script>
         $(function(){
             $('.slide-out-div').tabSlideOut({
                 tabHandle: '.handle',                              //class of the element that will be your tab
                 pathToTabImage: '<?php echo base_url();?>assets/user/images/browseall.png',          //path to the image for the tab (optionaly can be set using css)
                 imageHeight: '303px',                               //height of tab image
                 imageWidth: '51px',                               //width of tab image    
                 tabLocation: 'left',                               //side of screen where tab lives, top, right, bottom, or left
                 speed: 300,                                        //speed of animation
                 action: 'click',                                   //options: 'click' or 'hover', action to trigger animation
                 topPos: '300px',                                   //position from the top
                 fixedPosition: false                               //options: true makes it stick(fixed position) on scroll
             });
         });

         </script>




    <script src="<?php echo base_url();?>assets/user/lib/jquery.cookie.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/user/js/jquery.treeview.js" type="text/javascript"></script>
    
    <script type="text/javascript">
        $(function() {
            $("#tree").treeview({
                collapsed: true,
                animated: "medium",
                control:"#sidetreecontrol",
                prerendered: true,
                persist: "location"
            });
        })
        
    </script>
</head>
<body>

<div id="wrapper">
 <?php if($page=='image_selection'):?>
<div id="fixedsection" style="background-color:#0F6;
	margin:0 auto; 
	width:1330px; 
	position:fixed;
	height:10px;
	z-index: 10;">
    <?php else:?>
   
<div id="fixedsection" style="background-color:#0F6;
	margin:0 auto; 
	width:1330px; 
	
	height:10px;
	z-index: 10;">
    <?php endif;?>
  <div id="topmenu">
       <div id="logo" style="padding-left:320px"></div>
        <ul>
            <!--<li class="active"><a href="<?php //echo site_url('user/show_assetbox');?>">Asset Manager</a></li>
            <li><a href="#" >Channel Manager</a></li>
            <li><a href="#">Contributor</a></li>
            <li><a href="<?php //echo site_url('auth/logout')?>">Logout</a></li>-->
              <li <?php if($active_menu=='browse_media') echo 'class="active"'?>><a href="<?php echo site_url('user/index')?>">Browse Media</a></li>
              <li <?php if($active_menu=='my_cart') echo 'class="active"'?>><a href="<?php echo site_url('user/show_assetbox')?>">My Cart</a></li>
              <?php if($this->session->userdata('user_group')=='superadmin'):?>
           <li><a href="<?php echo site_url('auth/index')?>" target="_blank">Super Admin</a></li>
           
             <li><a href="<?php echo site_url('auth/logout')?>">Logout</a></li>
            <?php endif;?>
            <?php if($this->session->userdata('user_group')=='admin'):?>
           <li><a href="<?php echo site_url('admin/show_product')?>" target="_blank">Admin</a></li>
           
             <li><a href="<?php echo site_url('auth/logout')?>">Logout</a></li>
            <?php endif;?>
            <?php if($this->session->userdata('user_group')=='ch_manager'):?>
                <li><a href="<?php echo site_url('ch_admin/index')?>" target="_blank">Channel Manager</a></li>
                
                <li><a href="<?php echo site_url('auth/logout')?>">Logout</a></li>
            <?php endif;?>
            <?php if($this->session->userdata('user_group')=='sku_manager'):?>
                 <li><a href="<?php echo site_url('sku_admin/sku_manager')?>" target="_blank">SKU manager</a></li>
            
                <li><a href="<?php echo site_url('auth/logout')?>">Logout</a></li>
            <?php endif;?>
            <?php if($this->session->userdata('user_group')=='contributor'):?>
                <li><a href="#">contributor</a></li>
                 <li><a href="<?php echo site_url('conttributor/index')?>" target="_blank">Contributor</a></li>
                <li><a href="<?php echo site_url('auth/logout')?>">Logout</a></li>
            <?php endif;?>
            <?php if($this->session->userdata('user_group')=='guser'):?>
               
                <li><a href="<?php echo site_url('auth/logout')?>">Logout</a></li>
            <?php endif;?>
        </ul>    
        <div id="msg-welcome">Welcome <?php
		$n=explode(' ',$this->session->userdata('username'));
		 echo $n[0]; ?> &nbsp;!</div>
        <div id="msg-alert"><img src="<?php echo base_url();?>assets/user/images/excamation.png" style="margin:5px;"/>Alerts (5)</div> 
    </div>
    
    
    
    <div id="banner">
        <div class="text">AMP | Advanced Media Portal</div>
        <div class="rsg"><img src="<?php echo base_url();?>assets/user/images/rsg.png" /></div>
        <div class="rsg_button"><a href="<?php echo site_url('rsg/index');?>" onclick="show_scroller_()" style="text-decoration:none;"><strong>Check it out</strong> >></a></div>
        <div id="search">
            <div class="stext">Search <img src="<?php echo base_url();?>assets/user/images/search_arrow.png" /></div>
            <?php if($page=='image_selection'):?>
            <form>
                <input type="text" class="searchbox" placeholder="Series Level Assets" id="country" onkeyup="suggest(this.value);" onblur="fill();fillId();" class="" autocomplete="off"/>
              
                <div class="suggestionsBox" id="suggestions" style="display: none;"> 
                    <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
               </div>
            </form>
            <?php else:?>
            <form  name='searchForm' action="<?php echo site_url('user/list_view');?>" method="post">
                <input type="text" name="search" class="searchbox" size="25" placeholder="Series Level Assets" id="country1" onkeyup="suggest1(this.value);" onblur="fill1();fillId1();" class="" autocomplete="off"/>
                 
               
               <div class="suggestionsBox" id="suggestions1" style="display: none;"> 
                    <div class="suggestionList" id="suggestionsList1"> &nbsp; </div>
               </div>
               
            </form>
            
            <?php endif;?>
        </div>
        </div>
    </div>
    <div style="clear:both;<?php if($page=='image_selection') echo "padding:113px;";else echo "padding:0px;"?>"></div>
   <!-- <div id="pagepointer">Home > Products</div>-->
  
    <!-- Left Column Starts -->
    <div id="scroller_test" style="display:none;width:167%;">
    <head><script type="text/javascript" src="<?php echo base_url();?>assets/user/scroller/js/stscode.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/user/scroller/css/scroller.css"/>
<script type="text/javascript">
sts_bs("JWS",[20080623,"<?php echo base_url().'images/'?>","","blank.gif",0,1,0,5,"60%","left",1,5,230,230,0,0,1,0,0,1000,1,30,0,"stEffect(\"scroll(Rate=24,enabled=0,Duration=0.50)\")",-2,60],["ItBS","ItBW","ItBC","GBgC","GBgI","GBgR"]);
sts_til([0,"<?php echo $title;?>","left"],["F","FC","FD","BgC","BgI","BgR"]);
sts_pag(["UOtBgC","UOtF","UOtFC","UOtFD","UOvBgC","UOvF","UOvFC","UOvFD","SOtBgC","SOtF","SOtFC","SOtFD","SOvBgC","SOvF","SOvFC","SOvFD"]);
sts_sca(["center","middle","center","middle"],["LtEOt","LtEOv","LtD","LtIW","LtIH","RbEOt","RbEOv","RbD","RbIW","RbIH"]);
sts_tbd([1],["BS","BW","BC","CnSz","LtCn","RtCn","RbCn","LbCn","TBgC","TBgI","TBgR","RiBgC","RiBgI","RiBgR","BtBgC","BtBgI","BtBgR","LBgC","LBgI","LBgR"]);
<?php if(isset($rsg)):?>
<?php foreach($rsg as $r):?>
sts_ai("i0",[0,"<?php 
echo get_family_name($r->product_family_id).' '.get_series_name($r->product_series_id).'  Series\n';
if(isset($r->product_series_id)){
$mes_arr=get_series_message($r->product_series_id);
if(empty($mes_arr)) echo '\nMessage not Assigned';
else{echo '\n';
if(isset($mes_arr['1'])) echo $mes_arr['1'].'\n ';
if(isset($mes_arr['2'])) echo $mes_arr['2'].'\n';
if(isset($mes_arr['3'])) echo $mes_arr['3'].'\n';
}}?>","<?php echo site_url('user/image_selection/'.$r->product_series_id)?>","_self","<?php echo $this->product_series_model->get_product_series(array('product_series.series_id'=>$r->product_series_id))->image ?>",200,200,"center"],["ItBgC","OtF","OtFC","OtFD","OvF","OvFC","OvFD"],"i0","i0");
<?php endforeach;?>
<?php endif;?>sts_es();
</script>


</head>
    <!--<script type="text/javascript" src="<?php echo base_url();?>assets/user/scroller/js/scroller.js"></script>--></div>
 <!--  rsg section  starts-->
 
 
 <!--  rsg section  endss-->
 </div>
  <div><br /><br /><br />
   
     