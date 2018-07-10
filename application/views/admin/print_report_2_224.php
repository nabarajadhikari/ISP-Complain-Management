<head id="non-printable">
        <style type="text/css" media="print">
        @media print
        {
            #non-printable { display: none; }
            #printable {
                margin: 20px;
                display: block;
                height: auto;
                width:auto;
                font-size:18px;
                
                
            }
              
            .hide { visibility: hidden }
            title{display: none;}
            body { position:abaolute;margin-top:-0.61in;width:8.5in;
                background-color: #fff;
                margin: 0px;  /* this affects the margin on the content before sending to printer */
    
        }
        }
        </style>
        
        <title class="hide">Print Lead Information</title> 
</head>
<body>

<input type="button" onClick="window.print()" class="hide" value="Print"/> 
<?php  $k=1;?>
<div id="printable" style="width:210mm !important;height:297mm !important;">
<table border="1">
<tr>
    <td colspan="11"> <?php 
            if($this->session->userdata('assigned_technecian'))
            {
                        echo 'Assigned Technecian='.$technecian_options[$this->session->userdata('assigned_technecian')].'<br/>';
                        
            }
              if($this->session->userdata('created_date_l'))
              {
                if($this->session->userdata('created_date_u')) echo 'Complain Date= From '.$this->session->userdata('created_date_l').' To '.$this->session->userdata('created_date_u').'<br/>';
                else
                 echo 'Complain Date ='.$this->session->userdata('created_date_l').'<br/>';
              }
                
             if($this->session->userdata('finished_date_l'))
              {
                if($this->session->userdata('finished_date_u')) echo 'Finished Date= From '.$this->session->userdata('finished_date_l').' To '.$this->session->userdata('finished_date_u').'<br/>';
                else
                 echo 'Finished Date ='.$this->session->userdata('finished_date_l').'<br/>';
              }
              if($this->session->userdata('assigned_date_l'))
              {
                if($this->session->userdata('assigned_date_u')) echo 'Assigned Date= From '.$this->session->userdata('assigned_date_l').' To '.$this->session->userdata('assigned_date_u').'<br/>';
                else
                 echo 'Assigned Date ='.$this->session->userdata('assigned_date_l').'<br/>';
              }   
                
              if($this->session->userdata('statuss'))
              {
                echo 'Status='.$this->session->userdata('statuss').'<br/>';
              }
              else{
                $status_opt=array('Pending'=>'Pending','Assigned'=>'Assigned','Processing'=>'Processing','Finished'=>'Finished');
                foreach($status_opt as $key=>$index)
                {
                            $status_report[$key]=0; 
                }
                foreach($blogs as $blog)
                {
                     foreach($status_opt as $key=>$index)
                     {
                        if($blog->status==$status_opt[$key])
                            $status_report[$key]++; 
                     }
                }
                foreach($status_opt as $key=>$index)
                {
                            if($status_report[$key]) echo $key.'='.$status_report[$key].'<br/>';; 
                }
              }
              if($this->session->userdata('complain_title'))
              {
                echo 'Complain Title='.$this->session->userdata('complain_title').'<br/>';
              }
              if($this->session->userdata('name'))
              {
                  echo 'Name='.$this->session->userdata('name').'<br/>';
              }
              ?>
    </td> 
    
    
</tr>
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
     <td>Finished-Assigned</td> 
     <td>Finished-Created</td> 
    
    
</tr>
<?php  $i=1;foreach($blogs as $blog){$le[$k++]=$blog;?> 

<tr>
                                    <td><?php echo $i;?></td>
                                    <td title="<?php echo $le[$i]->complain_title;?>"><?php echo word_limiter($le[$i]->complain_title,4,'--');?></td> 
                                    <td><?php echo $le[$i]->name.' '.$le[$i]->address;?></td>
                                    <td><?php  echo $le[$i]->assigned_technecian?getUser($le[$i]->assigned_technecian):'';?></td> 
                                    <td><?php echo $le[$i]->status;?></td>
                                    <td><?php echo $le[$i]->created_date;?></td>
                                    <td><?php echo $le[$i]->assigned_date;?></td>
                                    <td><?php echo DiffDate($le[$i]->created_date,$le[$i]->assigned_date);?></td>
                                    <td><?php echo $le[$i]->finished_date;?></td>
                                    <td><?php echo $le[$i]->finished_date?DiffDate($le[$i]->assigned_date,$le[$i]->finished_date):"Not Finished";?></td>
                                    <td><?php echo $le[$i]->finished_date?DiffDate($le[$i]->created_date,$le[$i]->finished_date):"Not Finished";$i++;?></td>
                                    
                                
</tr>
 

 
<?php }?> 
</table>

</body>