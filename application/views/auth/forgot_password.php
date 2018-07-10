<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        
        <title>AMP(Assets Management Portal)</title>
        
        <!--                       CSS                       -->
      
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
      
        <!-- jQuery -->
        <script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/jquery-1.3.2.min.js"></script>
        
        <!-- jQuery Configuration -->
        <script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/simpla.jquery.configuration.js"></script>
        
        <!-- Facebox jQuery Plugin -->
        <script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/facebox.js"></script>
        
        <!-- jQuery WYSIWYG Plugin -->
        <script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/jquery.wysiwyg.js"></script>
        
        <!-- Internet Explorer .png-fix -->
        
        <!--[if IE 6]>
            <script type="text/javascript" src="<?php echo ASPATH ; ?>scripts/DD_belatedPNG_0.0.7a.js"></script>
            <script type="text/javascript">
                DD_belatedPNG.fix('.png_bg, img, li');
            </script>
        <![endif]-->
        
    </head>
  
    <body id="login">
        
        <div id="login-wrapper" class="png_bg">
            <div id="login-top">
            
                <h1>Forgot Password</h1>
                <p>Please enter your email address so we can send you an email to reset your password.</p>
                <!-- Logo (221px width) -->
                <img id="logo" width="400px" height="120px" src="<?php echo ASPATH ; ?>images/logo.jpg" alt="Toshiba" />
            </div> <!-- End #logn-top -->
            
            <div id="login-content">
                
                <?php echo form_open("auth/forgot_password");?>
                <?php echo displayStatus(); ?>  
                   <?php if(!empty($message)):?> 
                    <div class="notification information png_bg">
                        <div>
                        
                            <?php echo $message;?>

                        </div>
                        
                    
                    </div>
                      <?php endif; ?>
                      
                    <p>
                        <label>Email Address</label>
                        <?php echo form_input($email);?>
                    </p>
                    <div class="clear"></div>
                    <div class="clear"></div>
                    
                    <div class="clear"></div>
                    <p>
                        <input class="button" type="submit" value="submit" />
                    </p>
                    
                </form>
            </div> <!-- End #login-content -->
            
        </div> <!-- End #login-wrapper -->
        
  </body>
  </html>
