<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Example</title>

        <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        -->
        <script src="<?php echo base_url()?>assets/hc/jquery-1.10.2.min.js"></script><head>
<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Historic World Population by Region'
            },
            subtitle: {
                text: 'Source: Wikipedia.org'
            },
            xAxis: {
                categories: [<?php echo $x_axis;?>],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Population (millions)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' millions'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [<?php echo $series?>]
        });
    });
    

        
      function change_report_day()
      {
        var year=$('#report_year').val();
        var month=$('#report_month').val();
        if(year && month)
        {
            $.ajax({
                    url:"<?php echo site_url('report/get_days/')?>", 
                    data:{'year':year,'month':month},
                    type:"POST",
                    dataType:'html',
                    
                    success: function(data){
                        $('#report_day').empty();
                        $('#report_day').append(data);
                    } 
            }); 
              
                     
        
        }
        else
        {
          $('#report_day').empty();
        
        }
        
      
      }

        </script>
        <script src="<?php echo base_url()?>assets/hc/js/highcharts.js"></script>
<script src="<?php echo base_url()?>assets/hc/js/modules/exporting.js"></script>
</head>
<div>
 <div id="header" style="width:100%">
 <form action="<?php echo site_url('report/greport')?>" method="post">
 <select name="report_year" onchange="change_report_day()" id="report_year">
    <?php for($i=2011;$i<=date('Y');$i++){?>
    <option value="<?php echo $i?>" <?php if($selected_year==$i) echo 'selected'?>><?php echo $i?></option>
    <?php }?>
 </select> 
 <select name="report_month" onchange="change_report_day()" id="report_month">
 <option value="">None</option> 
     <?php for($i=1;$i<=12;$i++){?>
    <option value="<?php echo $i?>" <?php if($selected_month==$i) echo 'selected'?>><?php echo $i?></option>
    <?php }?>
 </select> 
 <select name="report_day" id="report_day">
    <option value="">None</option> 
       <?php for($i=1;$i<=$max_day;$i++){?>
    <option value="<?php echo $i?>" <?php if($selected_day==$i) echo 'selected'?>><?php echo $i?></option>
    <?php }?>
 </select>
 <input type="submit" value="Show Graph">
 </form>
 </div><br/>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
 </div>

    </body>
</html>
