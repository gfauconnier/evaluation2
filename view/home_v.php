<?php

require 'template/head.php';
require 'template/header.php';


echo $new_account_form->getForm();
?>

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
        <tr>
          <td><?php echo $account->getId_account(); ?></td>
          <td><?php echo $account->getAccount_name(); ?></td>
          <td><?php echo $account->getBalance(); ?></td>
          <td></td>
        </tr>
        <?php
      }
     ?>
  </tbody>
</table>

<?php
require 'template/foot.php';
