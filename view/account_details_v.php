<?php

require 'template/head.php';
require 'template/header.php';

$account = $current_account->getAttributes();
foreach ($account as $key => $value) {
  echo $key.' - '.$value.'<br>';
}
?>
<nav class="nav nav-tabs" id="accountTabs" role="tablist">
  <a class="nav-item nav-link active" id="nav-deposit-tab" data-toggle="tab" href="#nav-deposit" role="tab" aria-controls="nav-deposit" aria-selected="true">Deposit</a>
  <a class="nav-item nav-link" id="nav-withdraw-tab" data-toggle="tab" href="#nav-withdraw" role="tab" aria-controls="nav-withdraw" aria-selected="false">Withdrawal</a>
  <a class="nav-item nav-link" id="nav-transfer-tab" data-toggle="tab" href="#nav-transfer" role="tab" aria-controls="nav-transfer" aria-selected="false">Transfer</a>
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-deposit" role="tabpanel" aria-labelledby="nav-deposit-tab">
    <?php echo $deposit_form->getForm(); ?>
  </div>
  <div class="tab-pane fade" id="nav-withdraw" role="tabpanel" aria-labelledby="nav-withdraw-tab">
    <?php echo $withdraw_form->getForm(); ?>
  </div>
  <div class="tab-pane fade" id="nav-transfer" role="tabpanel" aria-labelledby="nav-transfer-tab">
    <?php echo $transfer_form->getForm(); ?>
  </div>
</div>







<?php
require 'template/foot.php';
