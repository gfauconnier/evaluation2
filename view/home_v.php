<?php

require 'template/head.php';
require 'template/header.php';

if(isset($message)) {
  foreach ($message as $value) {
    echo '<p>'.$value.'</p>';
  }
}
?>
<div class="greet">
  <h2>Hello <?php echo $connected_client->getF_name() .' '.$connected_client->getL_name(); ?></h2>
  <h3>Manage your accounts</h3>
</div>

<table id="accounts_table">
  <thead>
    <tr>
      <th>Account Id</th>
      <th>Account Name</th>
      <th>Balance</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($accounts as $account) {
        ?>
        <tr class="accounts" id="<?php echo $account->getId_account(); ?>" title="Show account details">
          <td><?php echo $account->getId_account(); ?></td>
          <td><?php echo $account->getAccount_name(); ?></td>
          <td class="balance"><?php echo $account->getBalance(); ?></td>
          <td class="acc_btn"><a href="account_details.php?id_account=<?php echo $account->getId_account(); ?>" class="btn btn-primary" title="Account details"><i class="material-icons">search</i></a>
            <?php
            $delete_form = new Form();
            $delete_form->addHidden('id_account', $account->getId_account());
            $delete_form->addInputSubmit('delete', 'btn btn-danger', '<i class="material-icons">delete_sweep</i>');
            echo $delete_form->getForm();
          ?></td>
        </tr>
        <?php
      }
     ?>
  </tbody>
</table>

<?php
require 'template/foot.php';
