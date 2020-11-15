<!-- botom-content-divs -->
<?php 
  include($level.LAYOUT.'incl/last_update.php');
  include($level.LAYOUT.'incl/pagination.php');
  //include($level.LAYOUT.'incl/div_content_bottom.php');
  include($level.LAYOUT.'incl/div_content_ads.php');
?>

<!-- /botom-content-divs -->


</div> <!-- /content /col-->

<!-- sidebar-r -->  
<div class="col-md-3">    
    <?php include('incl/sidebar_r.php'); ?>    
</div>  <!-- /sidebar-r /col-->


</div> <!-- /canvas-area /row -->
</div> <!-- /body /container-fluid -->

<?php
  include($level.LAYOUT.'incl/footer.php');
  include($level.LAYOUT.'incl/scripts.php');
?>