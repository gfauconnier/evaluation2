<?php

require 'template/head.php';
require 'template/header.php';

if(isset($message)) {
  foreach ($message as $value) {
    echo '<p>'.$value.'</p>';
  }
}
?>

<div class="owned_accounts">
  <select class="owned_accounts" name="owned_accounts" id="own_accounts">
    <option value="0">Change account</option>
    <?php
    foreach ($owned_accounts as $account) { ?>
      <option value="<?php echo $account->getId_account(); ?>" id="<?php echo $account->getId_account(); ?>"><?php echo $account->getAccount_name(); ?></option>
  <?php  } ?>
  </select>
</div>

<div class="account_details">
  <p>Account id : <?php echo $current_account->getId_account(); ?></p>
  <p>Account balance : <span id="test" class="balance"><?php echo $current_account->getBalance(); ?></span></p>
  <?php echo $delete_form->getForm(); ?>
</div>

<div class="col-12 col-md-10 mx-auto">
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
</div>







<?php
require 'template/foot.php';
