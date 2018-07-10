   <?php $base_url=base_url(); ?>
<?php if($type=="success"):?>
 <div id="success" class="info_div"><span class="ico_success"><?php foreach($messages as $m){ echo $m.'<br/>';} ?></span></div>
<?php elseif($type=='information'):?>
  <div id="warning" class="info_div"><span class="ico_error"><?php foreach($messages as $m){ echo $m.'<br/>';} ?></span></div>

<?php else:?>
 <div id="fail" class="info_div"><span class="ico_cancel"><?php foreach($messages as $m){ echo $m.'<br/>';} ?></span></div>

<?php endif; ?>
        