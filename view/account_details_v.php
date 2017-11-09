<?php

require 'template/head.php';
require 'template/header.php';

$account = $current_account->getAttributes();
foreach ($account as $key => $value) {
  echo $key.' - '.$value.'<br>';
}

echo $deposit_form->getForm();
echo $withdraw_form->getForm();
echo $transfer_form->getForm();

?>







<?php
require 'template/foot.php';
