<?php
 
?>
    <!-- Пагинация -->
<nav aria-label="Page navigation example">
  <ul class="pagination">
     
<?php	
    // $numeric_sidebar берётся из thislevel
    foreach($numeric_sidebar as $valuelink){       
        
          $contain_str = $_SERVER["PHP_SELF"]; // содержащая строка
          $find_str = $valuelink;                   // искомая строка
          $pos = strpos($contain_str, $find_str);
          if ($pos !== false) {  // если не ложь, то искомая найдена в содержащей
                                // т.е. одному элементу массива $keylink соответствует текущий URL 
              $current_valuelink = $valuelink;
               break;  // останавливаем весь цикл, когда истина(найдено)
          }
       // $testarr[] = $valuelink; // проверка остановки цикла
    }    
    // print_r($testarr);  // проверка остановки цикла
    
    $current_key = array_search($current_valuelink, $numeric_sidebar);
    
    // как выглядит: <li class="page-item"><a class="page-link" href="#">Previous</a></li>  
      
   if ($current_key != 0) { // "предыдущее" выводится только если ключ не на нулевой позиции в массиве
                            // просто, без нагрузок, узнаём - наше число не ноль?
					$prevlink = $numeric_sidebar[$current_key - 1];
					echo '<li class="page-item"><a class="page-link" href="'.$prevlink.'">Previous</a></li>';
				}   
    
      
    // как выглядит: <li class="page-item"><a class="page-link" href="#">Next</a></li>
      
    // KISS: а следующий элемент не пустой? нет, не пустой. ну тогда выведи его.
    // никаких циклов, переборов и сравнений
   if (!empty($numeric_sidebar[$current_key + 1])) { 
					$nextlink = $numeric_sidebar[$current_key + 1];					
					echo '<li class="page-item"><a class="page-link" href="'.$nextlink.'">Next</a></li>';
				}
    
?>     
</ul>
</nav>

