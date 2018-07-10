<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        
        <title>AMP (Assets Management Portal)</title>
        
        <!--                       CSS                       -->
        <style type="text/css" media="print">
        @media print
        {
            #non-printable { display: none; }
            #printable {
            display: block;
            width: 100%;
            height: 100%;
            }
        }
        </style>
        <!-- Datepicker -->
        <link rel="stylesheet" href="<?php echo ASPATH ; ?>css/tcal.css" type="text/css" media="screen" />
      
        <!-- Reset Stylesheet -->
        <link rel="stylesheet" href="<?php echo ASPATH ; ?>css/reset.css" type="text/css" media="screen" />
      
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="<?php echo ASPATH ; ?>css/style.css" type="text/css" media="screen" />
        
        <!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
        <link rel="stylesheet" href="<?php echo ASPATH ; ?>css/invalid.css" type="text/css" media="screen" />    
        
        <!-- Colour Schemes
      
        Default colour scheme is green. Uncomment prefered stylesheet to use it.
        
        <link rel="stylesheet" href="<?php echo ASPATH ; ?>css/blue.css" type="text/css" media="screen" />
        
        <link rel="stylesheet" href="<?php echo ASPATH ; ?>css/red.css" type="text/css" media="screen" />  
     
        -->
        
        <!-- Internet Explorer Fixes Stylesheet -->
        
        <!--[if lte IE 7]>
            <link rel="stylesheet" href="<?php echo ASPATH ; ?>css/ie.css" type="text/css" media="screen" />
        <![endif]-->
        
        <!--                       Javascripts                       -->
        <!-- jQuery Datepicker -->
        <script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/tcal.js"></script>
  
        <!-- jQuery -->
        <script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/jquery-1.3.2.min.js"></script>
        
        <!-- jQuery Configuration -->
        <script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/simpla.jquery.configuration.js"></script>
        
        <!-- Facebox jQuery Plugin -->
        <script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/facebox.js"></script>
        
        <!-- jQuery WYSIWYG Plugin -->
        <script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/jquery.wysiwyg.js"></script>
        
        <!-- jQuery Datepicker Plugin -->
        <script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/jquery.datePicker.js"></script>
        <script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/jquery.date.js"></script>
        <!--[if IE]><script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/jquery.bgiframe.js"></script><![endif]-->
        
        
        <!-- Internet Explorer .png-fix -->
        
        <!--[if IE 6]>
            <script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/DD_belatedPNG_0.0.7a.js"></script>
            <script type="text/javascript">
                DD_belatedPNG.fix('.png_bg, img, li');
            </script>
        <![endif]-->
        
    </head>
  
    <body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
        <div id="non-printable">
        <div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
            
            <h1 id="sidebar-title"><a href="#" >Toshiba</a></h1>
          
            <!-- Logo (221px wide) -->
            <a href=""><img id="logo" src="<?php echo ASPATH ; ?>images/logo.jpg" alt="toshiba" height="83.53px" width="221px"/></a>
          
            <!-- Sidebar Profile links -->
            <div id="profile-links">
                <!--Hello, <a href="#" title="Edit your profile">John Doe</a>, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a><br />-->
                <br />
                <a href="<?php echo site_url('user/list_view')?>" target="_blank" >Browse Media</a>|<a href="<?php echo site_url('auth/logout')?>" title="Sign Out">Sign Out</a>
            </div>        
            
            <ul id="main-nav">  <!-- Accordion Menu -->
                

                
                <li> 
                    <a href="#" class="nav-top-item "> <!-- Add the class "current" to current menu item -->
                    RSG Management
                    </a>
                    <ul>
                        <li><a <?php echo if_current('ch_admin','index'); ?> href="<?php echo site_url('ch_admin/add_rsg')?>">Add RSG</a></li>
                         <li><a <?php echo if_current('ch_admin','index'); ?> href="<?php echo site_url('ch_admin/ch_manager')?>">Manage RSG</a></li>
                        <li><a <?php echo if_current('ch_admin','index'); ?> href="<?php echo site_url('ch_admin/assign_series')?>">Assign Series to RSG</a></li>
                        <li><a <?php echo if_current('ch_admin','index'); ?> href="<?php echo site_url('ch_admin/manage_series')?>">Manage Series to RSG</a></li>
                        
                        
                    </ul>
                </li>
                 <li><a href="#"  class="nav-top-item">Contributor </a>
                    <ul>
                        <li><a <?php echo if_current('contributer','show_product_family'); ?> href="<?php echo site_url('contributer/show_product_family')?>">Manage Product Family</a></li> 
                        <li><a <?php echo if_current('contributer','show_product_series'); ?> href="<?php echo site_url('contributer/show_product_series')?>">Manage Product Series</a></li>
                          <li><a <?php echo if_current('contributer','show_product'); ?> href="<?php echo site_url('contributer/show_product')?>">Product SKU Manager</a></li>
                    </ul>
                </li>
                                
            </ul> <!-- End #main-nav -->
            
            <div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
                
                <h3>3 Messages</h3>
             
                <p>
                    <strong>17th May 2009</strong> by Admin<br />
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
                    <small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
                </p>
             
                <p>
                    <strong>2nd May 2009</strong> by Jane Doe<br />
                    Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
                    <small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
                </p>
             
                <p>
                    <strong>25th April 2009</strong> by Admin<br />
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
                    <small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
                </p>
                
                <form action="#" method="post">
                    
                    <h4>New Message</h4>
                    
                    <fieldset>
                        <textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
                    </fieldset>
                    
                    <fieldset>
                    
                        <select name="dropdown" class="small-input">
                            <option value="option1">Send to...</option>
                            <option value="option2">Everyone</option>
                            <option value="option3">Admin</option>
                            <option value="option4">Jane Doe</option>
                        </select>
                        
                        <input class="button" type="submit" value="Send" />
                        
                    </fieldset>
                    
                </form>
                
            </div> <!-- End #messages -->
            
        </div></div> <!-- End #sidebar -->
        </div>