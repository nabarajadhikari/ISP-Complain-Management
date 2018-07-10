<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AdminTheme - Ultimate Admin Panel Solution</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <!--[if IE]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection" /><![endif]-->
    <link rel="stylesheet" type="text/css" media="all" href="<?php  echo base_url() ;?>assets/admin/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="<?php  echo base_url() ;?>assets/admin/css/smoothness/jquery-ui-1.7.1.custom.css"  />    
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
    <script type="text/javascript">
        function hide_div_class(classes)
        {
            $("."+classes).hide();
        }
        function hide_div_id(id)
        {
            $("#"+id).hide();
        }
    </script>
    <script type="text/javascript" src="<?php  echo base_url() ;?>assets/admin/js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="<?php  echo base_url() ;?>assets/admin/js/jquery-ui-1.7.1.custom.min.js"></script>
        <script type="text/javascript" src="<?php  echo base_url() ;?>assets/admin/js/custom.js"></script>
    </head>
     <!--[if IE]><script language="javascript" type="text/javascript" src="excanvas.pack.js"></script><![endif]-->
</head>
<body>
<div  id="login_container">
    <div  id="header">
   
        <div id="logo"><h1><a href="/">Admin</a></h1></div>
        
    </div><!-- end header -->
       
        <div id="login" class="section">
            
            <?php echo displayStatus()?>   
            
            <!--<form name="loginform" id="loginform" action="index.html" method="post">-->
            <?php echo form_open("auth/login");?> 
            
            <label><strong>Email</strong></label><?php echo form_input($identity);?>
            <br />
            <label><strong>Password</strong></label><?php echo form_input($password);?>
            <br />
            <strong>Remember Me</strong><input type="checkbox" id="remember" class="input noborder" /> 
            
            <br />
        
            <input id="save" class="loginbutton" type="submit" class="submit" value="Log In" />
            
            </form>
            
           <!-- <a href="<?php echo site_url('auth/forgot_password')?>" id="passwordrecoverylink">Forgot your username or password?</a>-->
        </div>
    
        
            


</div><!-- end container -->

</body>
</html>
