<?php if (isset($_SESSION['msg'])): ?>
  <div class="alert alert-success alert-dismissible" role="alert" align = "center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php
      echo nl2br(html($_SESSION['msg']));
      unset($_SESSION['msg']);
	  
    ?>
  </div>
<?php endif; ?>

<?php if (isset($_SESSION['msgd'])): ?>
  <div class="alert alert-danger alert-dismissible" role="alert" align = "center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php
      echo nl2br(html($_SESSION['msgd']));
      unset($_SESSION['msgd']);
	  
    ?>
  </div>

<?php endif; ?>

 


<?php if (isset($_SESSION['error'])): ?>

  <div class="alert alert-danger alert-dismissible" role="alert" align = "center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php
      echo nl2br(html($_SESSION['error']));
      unset($_SESSION['error']);
    ?>
  </div>                 
<?php endif; ?>

<?php if (isset($_SESSION['login_msg'])): ?>
  <div class="alert alert-info alert-dismissible" role="alert" align = "center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php
      echo nl2br(html($_SESSION['login_msg']));
      unset($_SESSION['login_msg']);
	 
    ?>
  </div>
<?php endif; ?>


<?php if (isset($_SESSION['msgr'])): ?>
  <div class="alert alert-success alert-dismissible" role="alert" align = "center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php
      echo nl2br(html($_SESSION['msgr']));
	
      unset($_SESSION['msgr']);
	  
    ?>
  </div>
<?php endif; ?>

	<?php if (isset($error)): ?>
	  <div class="alert alert-danger alert-dismissible" role="alert" align = "center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php 
			// echo html($error);  
		   echo nl2br($error);
		?> 

		 </div>
	   <?php endif; ?>