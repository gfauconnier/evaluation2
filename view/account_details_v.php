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
  <?php echo $delete_form->getForm(); ?>
</div>
<hr>
<div class="container">

  <div class="row details">

    <table class="account_details col-11 col-md-6">
      <tr>
        <th>Account informations : </th>
      </tr>
      <tr>
        <td>Account id : </td>
        <td><?php echo $current_account->getId_account(); ?></td>
      </tr>
      <tr>
        <td>Account name :</td>
        <td><?php echo $current_account->getAccount_name(); ?></td>
      </tr>
      <tr>
        <td>Account balance</td>
        <td class="balance"><?php echo $current_account->getBalance(); ?></td>
      </tr>
    </table>

    <div class="col-12 col-md-6 mx-auto">

      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-movements-tab" data-toggle="pill" href="#nav-movements" role="tab" aria-controls="nav-movements" aria-selected="true">Movements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-deposit-tab" data-toggle="pill" href="#nav-deposit" role="tab" aria-controls="nav-deposit" aria-selected="true">Deposit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-withdraw-tab" data-toggle="pill" href="#nav-withdraw" role="tab" aria-controls="nav-withdraw" aria-selected="false">Withdraw</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-transfer-tab" data-toggle="pill" href="#nav-transfer" role="tab" aria-controls="nav-transfer" aria-selected="false">Transfer</a>
        </li>
      </ul>

      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-movements" role="tabpanel" aria-labelledby="nav-movements-tab">
          <p class="details">Last Movements</p>
          <table id="movements_table" class="col-12">
            <thead>
              <tr>
                <th>Movement</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($account_movements as $account_movement) {
                ?>
                <tr>
                  <td class="balance"><?php echo $account_movement->getMovement_value(); ?></td>
                  <td><?php
                  $date = date("d-m-Y H:i:s", strtotime($account_movement->getMovement_date()));
                  echo $date;?>
                </td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="nav-deposit" role="tabpanel" aria-labelledby="nav-deposit-tab">
          <p class="details">Deposit</p>
          <?php echo $deposit_form->getForm(); ?>
        </div>
        <div class="tab-pane fade" id="nav-withdraw" role="tabpanel" aria-labelledby="nav-withdraw-tab">
          <p class="details">Withdrawal</p>
          <?php echo $withdraw_form->getForm(); ?>
        </div>
        <div class="tab-pane fade" id="nav-transfer" role="tabpanel" aria-labelledby="nav-transfer-tab">
          <p class="details">Transfer</p>
          <?php echo $transfer_form->getForm(); ?>
        </div>
      </div>

    </div>

  </div>

</div>


<?php
require 'template/foot.php';
