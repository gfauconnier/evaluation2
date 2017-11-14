<?php
  require 'template/head.php';
  require 'template/header.php';

?>
<h2 class="new_client">Create a new client account</h2>
<div class="new_client">

<?php
  echo $new_client_form->getForm();
?>
</div>

<?php
  require 'template/foot.php';

 ?>
