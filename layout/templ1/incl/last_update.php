<?php 
      // классы вверху
  $p_class = 'text-muted';
  $p_align = 'right';
  // for ex.: w3-small w3-right
?>
    <!-- Обновлено -->
 <br>
 <p class="<?php echo $p_class; ?>" align="<?php echo $p_align; ?>"><em>Обновлено: 
<?php	$filename = $_SERVER['SCRIPT_FILENAME']; 			
     if (file_exists($filename)) {
          $date = date("d-M-Y", filemtime($filename));
          echo $date;
            } 
?>
</em></p>

