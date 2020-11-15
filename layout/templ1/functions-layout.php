<?php

function div_alert($type){
    switch ($type) {
        // w3-css
        case 'w3-success':       
		  echo 'class="w3-panel w3-pale-green w3-border" style="padding-top:10px ;" ';
            break;               
             
        // bootsrap 4    
		case 'bs-primary':       
		  echo 'class="alert alert-primary" role="alert"';
            break;
		case 'bs-success':      
		  echo 'class="alert alert-success" role="alert"';
            break;
        case 'bs-info': 
           echo 'class="alert alert-info" role="alert"';
            break;   
            
        // how bs-info   
		default:           
          echo 'class="alert alert-info" role="alert"';
	}
    
}

function code_open($string=""){ 
// htmlHigh jsHigh cssHigh sqlHigh, для php htmlHigh, поодробнее в w3codecolor

// w3-code добавляет белого фона для кода и зеленую полосу слева
// w3-container добавляет паддинг по кругу. сверху и снизу только 0.01 em
// w3-light-grey добавляет серый цвет паддингу
// w3-card-2 добавляет тень по кругу с разными величинами   
    
// подробнее об отступах для белого полотна кода:
// внизу от последней строчки pre добавляет 16px margin (от bootstrap'a, видимо)
// еще w3-code добавляет padding вниз-вверх 8px, слева-справа 12 px
$output = '<!-- code_open -->
	  <div class="w3-card-2">        
        <div class="w3-container w3-light-grey">		
          <div class="w3-code '.$string.'">';
 return $output;
}

function code_close(){    
$output = '</div>			
        </div>        
      </div>
	 <!-- code_close-->';
 return $output;    
}


