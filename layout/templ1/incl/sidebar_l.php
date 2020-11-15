<br>
<div>
    <ul class="nav nav-pills flex-column">  <!-- flex-column делает вертикальным -->
 
<?php      
        // классы вверху
     $active_class = 'active';
     $disabled_class = 'disabled';          
        
    foreach($sidebar as $link => $navitem){
        $output = '<li class="nav-item">';         
        
        $output.=  '<a class="nav-link ';
        
          $contain_str = $_SERVER["PHP_SELF"]; // содержащая строка
          $find_str = $link;                   // искомая строка
          $pos = strpos($contain_str, $find_str);
          if ($pos !== false) {
            $output.= "$active_class";
          }
          
          if (preg_match("/#/", $link)) {
             $output.= " $disabled_class";  
          }
        
        $output.= '" ';              // закрываем кавычки <a class=" "
        $output.= "href=\"$link\">";
        $output.=  "$navitem";
        $output.=  '</a>';
        $output.=  '</li>';
        
        echo $output;
    }        
    
?>
    </ul>
</div>