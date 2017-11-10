<header class="container-fluid">
  <div class="row">
    <a href="home.php" class="btn btn-primary">Home</a>
    <?php
    echo $header_form->getForm();
    if (isset($_SESSION['client'])) {
    ?>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseNewAccount" aria-expanded="false" aria-controls="collapseNewAccount">
      New Account
    </button>
  <?php } ?>
  </div>
</header>
<div class="container collapse" id="collapseNewAccount">

<?php
if (isset($_SESSION['client'])) {
  echo $new_account_form->getForm();
}
?>
</div>
