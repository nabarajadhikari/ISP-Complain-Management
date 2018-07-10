<h1>Create User</h1>
<p>Please enter the users information below.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_staff");?>

      <p>
            <label>First Name: </label>
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <label>Last Name: </label>
            <?php echo form_input($last_name);?>
      </p>
      <p>
            <label>Phone:</label>
            <?php echo form_input($phone1);?>
      </p>
      
      <p>
            <label>Email: </label>
            <?php echo form_input($email);?>
      </p>
      <p>
            <label>Password: </label>
            <?php echo form_input($password);?>
      </p>

      <p>
            <label>Confirm Password:</label>
            <?php echo form_input($password_confirm);?>
      </p>
      <p>
            <label>Address:</label>
            <?php echo form_input($address);?>
      </p>
      <p>
        <label>Suburb:</label> 
         <?php echo form_input($res_subrub); ?>
         <br /><small>This field is required.</small> 
      </p>
    <p>
        <label>State:</label> 
         <?php echo form_input($res_state); ?>
         <br /><small>This field is required.</small> 
      </p>
       <p>
        <label>Post Code:</label> 
         <?php echo form_input($res_postcode); ?>
         <br /><small>This field is required.</small> 
      </p>
      <p>
        <label>Client's Bank Name:</label> 
         <?php echo form_dropdown('bank_name',$bank_option,$bank_name['selected']); ?>
         <br /><small>This field is required.</small> 
      </p>
      <p>
        <label>BSB Number:</label> 
         <?php echo form_input($bank_bsb); ?>
         <br /><small>This field is required.</small> 
      </p>
      <p>
        <label>A/c Number:</label> 
         <?php echo form_input($bank_account_number); ?>
         <br /><small>This field is required.</small> 
      </p>


      <p><?php echo form_submit('submit', 'Create User');?></p>

<?php echo form_close();?>