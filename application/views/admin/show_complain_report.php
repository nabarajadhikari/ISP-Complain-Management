
<link href="<?php echo base_url();?>assets/calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?php echo base_url();?>assets/calendar/calendar.js"></script>
 <?php require_once(FCPATH.'assets/calendar/classes/tc_date.php');
require_once(FCPATH.'assets/calendar/classes/tc_calendar.php');
require_once(FCPATH.'assets/calendar/calendar_functions.php');
?>
<div id="shortcuts" class="clearfix">
             <!--<h2 class="ico_mug">Manage Complains<div style="float:right;"><a href="<?php echo site_url('auth/index')?>"><img src="<?php echo base_url() ; ?>assets/admin/img/home.png" height="22px;" alt="home" /></a><div></h2>
             -->
                <?php echo displayStatus(); ?>
                     <a href="<?php echo site_url('report/print_report'); ?>" id="save">Report</a>  <span id="sdf" style="float:right;margin-left:150px;"><strong><?php echo count($blogs);?> Record(s)</strong></span>  
                        
                         
                            
                         
                           
                            <div class="lightbox1"><a href="#" class="close" onclick="closeme()"><img src="<?php echo ASPATH ; ?>/img/cancel.png" alt="cancel" style="margin-top: 20px;"/></a><div class="lightbox_innerbox"></div></div>
                           <table>

                           <tr>

                           <td colspan="10"><?php echo form_open('report/show_complain');?> 
                           <input name="complain_title" type="text" placeholder="Title" value="<?php echo $this->session->userdata('complain_title')?>">
                           <input name="name" type="text" placeholder="client name" value="<?php echo $this->session->userdata('name')?>"> 
                           <!--<input name="statuss" type="text" placeholder="status" value="<?php echo $this->session->userdata('statuss')?>"> 
                           --><?php  echo form_dropdown('assigned_technecian',$technecian_options,$this->session->userdata('assigned_technecian'));?>
                           <?php $status_opt=array(null=>"Choose Status",'Pending'=>'Pending','Assigned'=>'Assigned','Processing'=>'Processing','Finished'=>'Finished'); echo form_dropdown('statuss',$status_opt,$this->session->userdata('statuss'));?>
             <div>              
              <div style="float: left;">
                <div style="float: left; padding-right: 3px; line-height: 18px;">Created From:</div>
                  <div style="float: left;">
                  <?php
                        $thisweek = date('W');
                        $thisyear = date('Y');

                        $dayTimes = getDaysInWeek($thisweek, $thisyear);
                        //----------------------------------------

                        $date1 = $this->session->userdata('created_date_l');//date('Y-m-d', $dayTimes[0]);
                        $date2 = $this->session->userdata('created_date_u');//date('Y-m-d', $dayTimes[(sizeof($dayTimes)-1)]);

                        function getDaysInWeek ($weekNumber, $year, $dayStart = 1) {
                          // Count from '0104' because January 4th is always in week 1
                          // (according to ISO 8601).
                          $time = strtotime($year . '0104 +' . ($weekNumber - 1).' weeks');
                          // Get the time of the first day of the week
                          $dayTime = strtotime('-' . (date('w', $time) - $dayStart) . ' days', $time);
                          // Get the times of days 0 -> 6
                          $dayTimes = array ();
                          for ($i = 0; $i < 7; ++$i) {
                            $dayTimes[] = strtotime('+' . $i . ' days', $dayTime);
                          }
                          // Return timestamps for mon-sun.
                          return $dayTimes;
                        }


                      $myCalendar = new tc_calendar("created_date_l", true, false);
                      $myCalendar->setIcon(base_url()."assets/calendar/images/iconCalendar.gif");
                      $myCalendar->setText(null);
                      $myCalendar->setDate(date('d', strtotime($date1)), date('m', strtotime($date1)), date('Y', strtotime($date1)));
                      $myCalendar->setPath(base_url()."assets/calendar/");
                      $myCalendar->setDateFormat("Y-m-d");
                      $myCalendar->setYearInterval(1970, 2020);
                      $myCalendar->dateAllow('2013-01-1', "", false);
                      $myCalendar->setAlignment('left', 'bottom');
                      $myCalendar->setDatePair('created_date_l', 'created_date_u', $date2);
                      //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
                      $myCalendar->writeScript();
                      ?>
                  </div>
                  </div>
                      <div style="float: left;"> 
                      
                      <div style="float: left; padding-right: 3px; line-height: 18px;">To:</div>
                      <div style="float: left;">
                     
                  <?php
                      $myCalendar = new tc_calendar("created_date_u", true, false);
                      $myCalendar->setIcon(base_url()."assets/calendar/images/iconCalendar.gif");
                      $myCalendar->setText(null);
                      $myCalendar->setDate(date('d', strtotime($date2)), date('m', strtotime($date2)), date('Y', strtotime($date2)));
                      $myCalendar->setPath(base_url()."assets/calendar/");
                      $myCalendar->setDateFormat("Y-m-d");
                      $myCalendar->setYearInterval(1970, 2020);
                      $myCalendar->dateAllow('2013-01-1', "", false);
                      //$myCalendar->dateAllow("", '2009-11-03', false);
                      $myCalendar->setAlignment('left', 'bottom');
                      $myCalendar->setDatePair('created_date_l', 'created_date_u', $date1);
                      //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
                      $myCalendar->writeScript();
                      ?>
                </div>
                </div>
              
              
               <div style="float: left;">
                <div style="float: left; padding-right: 3px; line-height: 18px;">Assigned From:</div>
                  <div style="float: left;">
                  <?php
                        $date_ass1 = $this->session->userdata('assigned_date_l');//date('Y-m-d', $dayTimes[0]);
                        $date_ass2 = $this->session->userdata('assigned_date_u');//date('Y-m-d', $dayTimes[(sizeof($dayTimes)-1)]);
                        
                        $myCalendar = new tc_calendar("assigned_date_l", true, false);
                      $myCalendar->setIcon(base_url()."assets/calendar/images/iconCalendar.gif");
                      $myCalendar->setText(null);
                      $myCalendar->setDate(date('d', strtotime($date_ass1)), date('m', strtotime($date_ass1)), date('Y', strtotime($date_ass1)));
                      $myCalendar->setPath(base_url()."assets/calendar/");
                      $myCalendar->setDateFormat("Y-m-d");
                      $myCalendar->setYearInterval(1970, 2020);
                      $myCalendar->dateAllow('2013-01-1', "", false);
                      $myCalendar->setAlignment('left', 'bottom');
                      $myCalendar->setDatePair('assigned_date_l', 'assigned_date_u', $date_ass2);
                      //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
                      $myCalendar->writeScript();
                      ?>
                  </div>
                  </div>
                      <div style="float: left;"> 
                      
                      <div style="float: left; padding-right: 3px; line-height: 18px;">To:</div>
                      <div style="float: left;">
                     
                  <?php
                      $myCalendar = new tc_calendar("assigned_date_u", true, false);
                      $myCalendar->setIcon(base_url()."assets/calendar/images/iconCalendar.gif");
                      $myCalendar->setText(null);
                      $myCalendar->setDate(date('d', strtotime($date_ass2)), date('m', strtotime($date_ass2)), date('Y', strtotime($date_ass2)));
                      $myCalendar->setPath(base_url()."assets/calendar/");
                      $myCalendar->setDateFormat("Y-m-d");
                      $myCalendar->setYearInterval(1970, 2020);
                      $myCalendar->dateAllow('2013-01-1', "", false);
                      //$myCalendar->dateAllow("", '2009-11-03', false);
                      $myCalendar->setAlignment('left', 'bottom');
                      $myCalendar->setDatePair('assigned_date_l', 'assigned_date_u', $date_ass1);
                      //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
                      $myCalendar->writeScript();
                      ?>
                </div>
                </div>
                
                <div style="float: left;">
                <div style="float: left; padding-right: 3px; line-height: 18px;">Finished From:</div>
                  <div style="float: left;">
                  <?php
                        $date_fin1 = $this->session->userdata('finished_date_l');//date('Y-m-d', $dayTimes[0]);
                        $date_fin2 = $this->session->userdata('finished_date_u');//date('Y-m-d', $dayTimes[(sizeof($dayTimes)-1)]);
                        
                        $myCalendar = new tc_calendar("finished_date_l", true, false);
                      $myCalendar->setIcon(base_url()."assets/calendar/images/iconCalendar.gif");
                      $myCalendar->setText(null);
                      $myCalendar->setDate(date('d', strtotime($date_fin1)), date('m', strtotime($date_fin1)), date('Y', strtotime($date_fin1)));
                      $myCalendar->setPath(base_url()."assets/calendar/");
                      $myCalendar->setDateFormat("Y-m-d");
                      $myCalendar->setYearInterval(1970, 2020);
                      $myCalendar->dateAllow('2013-01-1', "", false);
                      $myCalendar->setAlignment('left', 'bottom');
                      $myCalendar->setDatePair('finished_date_l', 'finished_date_u', $date_fin2);
                      //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
                      $myCalendar->writeScript();
                      ?>
                  </div>
                  </div>
                      <div style="float: left;"> 
                      
                      <div style="float: left; padding-right: 3px; line-height: 18px;">To:</div>
                      <div style="float: left;">
                     
                  <?php
                      $myCalendar = new tc_calendar("finished_date_u", true, false);
                      $myCalendar->setIcon(base_url()."assets/calendar/images/iconCalendar.gif");
                      $myCalendar->setText(null);
                      $myCalendar->setDate(date('d', strtotime($date_fin2)), date('m', strtotime($date_fin2)), date('Y', strtotime($date_fin2)));
                      $myCalendar->setPath(base_url()."assets/calendar/");
                      $myCalendar->setDateFormat("Y-m-d");
                      $myCalendar->setYearInterval(1970, 2020);
                      $myCalendar->dateAllow('2013-01-1', "", false);
                      //$myCalendar->dateAllow("", '2009-11-03', false);
                      $myCalendar->setAlignment('left', 'bottom');
                      $myCalendar->setDatePair('finished_date_l', 'finished_date_u', $date_fin1);
                      //$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
                      $myCalendar->writeScript();
                      ?>
                </div>
                </div>
                </div>
              <!--<input name="created_date_l1" type="text" placeholder="Created Date(yyyy-mm-dd)" value="<?php echo $this->session->userdata('created_date_l')?>">
                           <input name="created_date_u1" type="text" placeholder="To Created Date(yyyy-mm-dd)" value="<?php echo $this->session->userdata('created_date_u')?>">
                           <input name="assigned_date_l1" type="text" placeholder="Assigned Date(yyyy-mm-dd)" value="<?php echo $this->session->userdata('assigned_date_l')?>">
                           <input name="assigned_date_u1" type="text" placeholder="To Assigned Date(yyyy-mm-dd)" value="<?php echo $this->session->userdata('assigned_date_u')?>">
                           <input name="finished_date_l1" type="text" placeholder="Finish Date(yyyy-mm-dd)" value="<?php echo $this->session->userdata('finished_date_l')?>">
                           <input name="finished_date_u1" type="text" placeholder="To Finish Date(yyyy-mm-dd)" value="<?php echo $this->session->userdata('finished_date_u')?>">
                             -->
                           <input type="submit" value="Search">
                          
                           </form></td>


                           </tr>
                           </table>
                           <div id='load'>
                            <table id="table">
<tr>
    <td>ID</td>
    <td>Title</td> 
    <td>Client</td>
    <td>Technician</td> 
    <td>Status</td> 
    <td>Created</td>
     <td>Assigned</td> 
     <td>Assigned Duration</td> 
     <td>Finished</td> 
     <td>Finished Duration</td> 
    
    
</tr>
 <?php foreach($blogs as $blog):?>
                            <tr <?php if($blog->status=='Pending') echo 'id="fail"';elseif($blog->status=='Finished') echo  'id="success"';elseif($blog->status=='Processing')echo 'id="processing"';elseif($blog->status=='Assigned') echo 'id="warning"';?>>
                                    <td><?php echo $blog->id;?></td>
                                    <td title="<?php echo $blog->complain_title;?>"><?php echo word_limiter($blog->complain_title,4,'--');?></td> 
                                    <td><?php echo $blog->name.' '.$blog->address;?></td>
                                    <td><?php  echo $blog->assigned_technecian?getUser($blog->assigned_technecian):'';?></td> 
                                    <td><?php echo $blog->status;?></td>
                                    <td><?php echo $blog->created_date;?></td>
                                    <td><?php echo $blog->assigned_date;?></td>
                                    <td><?php echo DiffDate($blog->created_date,$blog->assigned_date);?></td>
                                    <td><?php echo $blog->finished_date;?></td>
                                    <td><?php echo DiffDate($blog->created_date,$blog->finished_date);?></td>
                                    
                                
                                </tr>
 <?php endforeach;?>
    </table>
                           
                           </div> 
                            
                                       
           
 </div> 

</div>


        