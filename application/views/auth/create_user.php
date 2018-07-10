<div id="shortcuts" class="clearfix" style="width:740px !important;">
<h2 class="ico_mug">Create User</h2>
<?php echo $message;echo displayStatus();?>
 <fieldset  class="left" style="width:720px !important;">
<?php echo form_open("auth/create_user");?>
     
      <p>
            First Name: <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            Last Name: <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
            Company Name: <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            Email: <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            Phone: <br />
            <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
      </p>

      <p>
            Password: <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            Confirm Password: <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', 'Create User');?></p>

<?php echo form_close();?>
</fieldset>  
</div> <!-- End .content-box -->                                 
 <?php $this->load->view('admin_sidebar');?>                          

</div>