<?php

  /** 
   * Pagination Helper functions for CodeIgniter 
   * @author acpmasquerade@gmail.com
  **/
  
  if(!function_exists("build_pagination_links")){
  
      /**
      * Builds pagination links wrapped by a div with class=pagination
      * 
      * @param mixed $page_number
      * @param mixed $limit
      * @param mixed $max_results
      * @param mixed $page_prefix
      * @param mixed $page_suffix

      * @author acpmasquerade
      */
      function build_pagination_links($page_number = 1, $limit = 50, $max_results, $page_prefix, $page_suffix = "", $show_title = true){
          
          echo '<div class="pagination">';
                 
          
          # calcuate last page
          $last_page = ceil($max_results/$limit);
          if($last_page > 0){
              if($show_title):
               // h2(_t("pagination_title"));
              endif; 
              # generate first and previous links
              if($last_page>1){
              if($page_number != 1){
                  echo "<span class='prev'>";
                  echo anchor($page_prefix."1/".$limit."/".$page_suffix,  "&laquo; ".("first"),"class='pagi'");
                  echo "</span>"; 
                  echo "<span class='prev'>";  
                  echo anchor($page_prefix.($page_number - 1)."/".$limit."/".$page_suffix, "&laquo; ".("previous"),"class='pagi'");
                  echo "</span>";
              }
              
              # trim the pagination, currently set to 20 for maximum
              # generate the links
              
              $trim = array();
              
              if($last_page > 20){
                  
                  $a = 1;
                  $b = 4;
                  
                  $c = $page_number - 4;
                  $d = $page_number;
                  
                  $e = $page_number + 4;
                  $f = $last_page - 4;
                  $g = $last_page;

                  $trim[] = array($a,$b);
                  $trim[] = array($c,$d);
                  $trim[] = array($d,$e);
                  $trim[] = array($f,$g);
        
              }else{
                  $trim[] = array(1, $last_page);
              }
              
              $trim[] = array($last_page, $last_page + 1);
              
              if($last_page>1){
              # generate links
              
              $previous = 1;
                 
              foreach($trim as $x){
                  echo "<span class='pg'>";
                  $start = $x[0];
                  $end = $x[1];
                  
                  if($previous > $start)
                    $start = $previous;
                  
                  if($end < $start)
                    continue;
                    
                  if($end < $previous){
                    continue;
                  }
                  
                  
                  if(($start - $previous) > 1){
                      echo "<a href=#>...</a>";
                  }
                  
                  for($i = $start ; $i < $end ; $i++){
                      if($i > $last_page)
                        continue;
                      if($page_number == $i){ 
                          echo anchor($page_prefix.$i."/".$limit."/".$page_suffix, $i, "class='number current pagi'");
                          
                      }else{
            
                          echo anchor($page_prefix.$i."/".$limit."/".$page_suffix, $i, "class='number pagi'");
                          
                          
                      }   
                  }
                   
                  $previous = $end;
                  echo "</span>"; 
              }
              
              
              # generate last and next links
              
                  echo "<span class='next'>";  
                  echo anchor($page_prefix.($page_number + 1)."/".$limit."/".$page_suffix,  ("next")." &raquo;","class='pagi'");
                  echo "</span>";
                  echo "<span class='next'>";   
                  echo anchor($page_prefix.$last_page."/".$limit."/".$page_suffix,  ("last")." &raquo;","class='pagi'");
                  echo "</span>";
                  
              }
          }
          }
          echo "<div class='clrboth'></div>";
          echo "</div>";
           
      }
  }

  if(!function_exists("pagination_offset")){
      /**
      * Returns pagination offset for the limit and page number provided
      * @author acpmasquerade
      * 
      * @param mixed $page_number - the page number which starts with the convention of 1 as the first page
      * @param mixed $limit - the number of rows to be returned
      */

      function pagination_offset($page_number, $limit){
          if($page_number <= 1){
              $page_number = 1;
          }
          
          if($limit < 1)
            $limit = 10;

          $rows = $limit;
          
          $offset = ($page_number - 1) * $rows;
          
          return $offset; 
      }
  }  

  if(!function_exists("paginate")){
      /**                        
      * Returns an array with rows and offset attributes for pagination
      * @author acpmasquerade
      * 
      * @param mixed $limit - row results per page
      * @param mixed $offset - offset
      */
      function paginate($limit, $offset){
          
          return array("rows"=>$limit,
                        "offset"=>$offset);
      }
  }
  
    if(!function_exists("build_prenext_links")){
  
      /**
      * Builds pagination links wrapped by a div with class=pagination
      * 
      * @param mixed $page_number
      * @param mixed $limit
      * @param mixed $max_results
      * @param mixed $page_prefix
      * @param mixed $page_suffix

      * @author acpmasquerade
      */
      function build_prenext_links($page_number = 1, $limit = 50, $max_results, $page_prefix, $page_suffix = "", $postdata, $show_title = true){
          
          echo '<div class="pagination">';
          if(is_array($postdata)){
              echo "<form name='pagination_form' method='post'>";
                foreach ($postdata as $key=>$value){
                    echo form_hidden($key,$value);
                }
              echo "</form>";
              
              # building jquery for form submission
              ?>
              <script type='text/javascript'>
                  $(function(){
                      $("div.pagination a").click(function(){
                          var pagination_form = $("div.pagination form[name=pagination_form]");
                          var action_path = $(this).attr("href");
                          
                          pagination_form.attr("action",$(this).attr("href"));
                          
                          var event = jQuery.Event("submit");
                          pagination_form.trigger(event);
                          
                          // This is very important, 
                          // Event trigger worked only after I returned false. 
                          return false; 
                      });
                      
                      
                  });
              </script>
              <?php
          }          
          
          # calcuate last page
          $last_page = ceil($max_results/$limit);
          if($last_page > 0){
              if($show_title):
                h2(_t("pagination_title"));
              endif; 
              
              
              # trim the pagination, currently set to 20 for maximum
              # generate the links
              
              $trim = array();
              
              if($last_page > 20){
                  
                  $a = 1;
                  $b = 4;
                  
                  $c = $page_number - 4;
                  $d = $page_number;
                  
                  $e = $page_number + 4;
                  $f = $last_page - 4;
                  $g = $last_page;

                  $trim[] = array($a,$b);
                  $trim[] = array($c,$d);
                  $trim[] = array($d,$e);
                  $trim[] = array($f,$g);
        
              }else{
                  $trim[] = array(1, $last_page);
              }
              
              $trim[] = array($last_page, $last_page + 1);
              

              
              # generate last and next links
              if($last_page>1){
              if($page_number != $last_page){
                  echo "<div class='rprenext'>";  
                  echo anchor($page_prefix.($page_number + 1)."/".$limit."/".$page_suffix,  ("next")." &raquo;","class='pagi'");

                  echo "</div>";
                  
              }
              
              # generate first and previous links
              if($page_number != 1){
                  echo "<div class='lprenext'>";

                  echo anchor($page_prefix.($page_number - 1)."/".$limit."/".$page_suffix, "&laquo; ".("previous"));
                  echo "</div>";
              }
          }
          }
          echo "<div class='clrboth'></div>";
          echo "</div>";
           
      }
  }
  
