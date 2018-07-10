<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
                               
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ; ?>assets/admin/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="<?php echo base_url() ; ?>assets/admin/css/smoothness/jquery-ui-1.7.1.custom.css"  />    
    <!--[if IE 7]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection" /><![endif]-->
    <!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="screen, projection" /><![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ; ?>assets/admin/markitup/skins/markitup/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ; ?>assets/admin/markitup/sets/default/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ; ?>assets/admin/css/superfish.css" media="screen">
    <!--[if IE]>
        <style type="text/css">
          .clearfix {
            zoom: 1;     /* triggers hasLayout */
            display: block;     /* resets display for IE/Win */
            }  /* Only IE can see inside the conditional comment
            and read this CSS rule. Don't ever use a normal HTML
            comment inside the CC or it will close prematurely. */
        </style>
    <![endif]-->
    <!-- JavaScript -->
    <script type="text/javascript" src="<?php echo base_url() ; ?>assets/admin/js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ; ?>assets/admin/js/jquery-ui-1.7.1.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ; ?>assets/admin/js/hoverIntent.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ; ?>assets/admin/js/superfish.js"></script>
    <script type="text/javascript">
        // initialise plugins
        jQuery(function(){
            jQuery('ul.sf-menu').superfish();
        });

    </script>
    <script type="text/javascript" src="<?php echo base_url() ; ?>assets/admin/js/excanvas.pack.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ; ?>assets/admin/js/jquery.flot.pack.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ; ?>assets/admin/markitup/jquery.markitup.pack.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ; ?>assets/admin/markitup/sets/default/set.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ; ?>assets/admin/js/custom.js"></script>

     <!--[if IE]><script language="javascript" type="text/javascript" src="excanvas.pack.js"></script><![endif]-->
</head>
<body>
<div class="container" id="container">
    <div  id="header" style="display:none;">
        <div id="profile_info">
            <img src="<?php echo base_url() ; ?>assets/admin/img/avatar.jpg" id="avatar" alt="avatar" />
            <p>Welcome <strong><?php echo $this->session->userdata['username']?></strong>. <a href="<?php echo site_url('auth/logout')?>">Log out?</a></p>
            <p class="last_login">Last login: <?php echo date('Y-m-d h:m',$this->session->userdata['old_last_login'])?></p>
        </div>
        <div id="logo"><h1><a href="/">Admin</a></h1></div>
        
    </div><!-- end header -->
        <div id="content" >
        <div id="top_menu" class="clearfix">
            <ul class="sf-menu"> <!-- DROPDOWN MENU -->
            <?php if($this->session->userdata('user_group')=='superadmin'){?>
            <li>
                        <a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a>
            </li>
           <!-- <li>
                        <a href="<?php echo site_url('user/add_complain_type')?>">Add Complain Type</a>
            </li>
            <li>
                        <a href="<?php echo site_url('user/show_complain_type')?>">Manage Complain Type</a>
            </li>-->
            <li>
                        <a href="<?php echo site_url('user/add_client')?>">Add Client</a>
            </li><li>
                        <a href="<?php echo site_url('user/show_client')?>">Show Client</a>
             </li><li>
                        <a href="<?php echo site_url('user/add_complain')?>">Add Complain</a>
             </li><li>
                        <a href="<?php echo site_url('admin/show_complain')?>">Show Complain</a>
             </li>  
             <li>
                        <a href="<?php echo site_url('report/show_complain')?>">Reports</a>
             </li>           
              <?php }
			    elseif($this->session->userdata('user_group')=='admin'){?>
            <li>
                        <a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a>
            </li>
           
            <li>
                        <a href="<?php echo site_url('user/add_client')?>">Add Client</a>
            </li><li>
                        <a href="<?php echo site_url('user/show_client')?>">Show Client</a>
             </li><li>
                        <a href="<?php echo site_url('user/add_complain')?>">Add Complain</a>
             </li><li>
                        <a href="<?php echo site_url('admin/show_complain')?>">Show Complain</a>
             </li>           
              <?php }
			  elseif($this->session->userdata('user_group')=='technician'){?> 
               <li>
                        <a href="<?php echo site_url('technician/show_complain')?>">Show Complain</a>
             </li>
             <?php }else{?>
               <li>
                        <a href="<?php echo site_url('user/add_client')?>">Add Client</a>
               </li><li>
                        <a href="<?php echo site_url('user/show_client')?>">Show Client</a>
               </li><li>
                        <a href="<?php echo site_url('user/add_complain')?>">Add Complain</a>
                </li><li>
                        <a href="<?php echo site_url('user/show_complain')?>">Show Complain</a>
                </li>
                <?php }?>
               <!-- <li>
                        <a href="<?php echo site_url('welcome/index')?>">Flash Complain</a>
                </li>-->
                 <li>
                        <a href="<?php echo site_url('auth/logout')?>">Logout</a>
             </li> 
                
           
            
        </ul>
            <a href="<?php echo site_url()?>" id="visit" class="right">Visit site</a>
        </div>
        <div id="content_main" class="clearfix">
            <div id="main_panel_container" class="left">
        
                   
        </div><!-- end #content_main -->