<?php

require_once '../model/data.php';
require_once '../services/services.php';

if (isset($_POST['disconnect'])) {
    disconnection();
}

if (isset($_SESSION['client'])) {
    if (isset($_GET['id_account'])) {

        $id_account['id_account'] = sanitizeStr($_GET['id_account']);
        $current_account = new Account($id_account);
        $current_account = $account_manager->getAccount($current_account);

        if ($current_account) {
            $header_form = new Form();
            $header_form->addInputSubmit('disconnect', 'btn btn-primary', 'Disconnect');

            $connected_client = new Client($_SESSION['client']);

            $deposit_form = new Form();
            $deposit_form->addInputText('Sum', 'sum', '', '', 'Sum to deposit');
            $deposit_form->addInputSubmit('deposit', 'btn btn-primary', 'Deposit');

            $withdraw_form = new Form();
            $withdraw_form->addInputText('Sum', 'sum', '', '', 'Sum to withdraw');
            $withdraw_form->addInputSubmit('withdraw', 'btn btn-primary', 'Withdraw');

            $owned_accounts = $account_manager->getAllAccounts($connected_client, $current_account->getId_account());
            $transfer_form = new Form();
            $transfer_form->addInputText('Sum', 'sum', '', '', 'Sum to transfer');
            $transfer_form->addSelect('target_account', $owned_accounts);
            $transfer_form->addInputSubmit('transfer', 'btn btn-primary', 'Transfer');

          // deposit
            if(isset($_POST['deposit'], $_POST['sum']) && !empty($_POST['sum'])) {
              $sum = clean_sum($_POST['sum']);
              if($current_account->deposit($sum)) {
                $account_manager->updateAccount($current_account);
              } else {
                echo 'An error occured';
              }
            }

          // widthdrawal
          if(isset($_POST['withdraw'], $_POST['sum']) && !empty($_POST['sum'])) {
            $sum = clean_sum($_POST['sum']);
            if($current_account->withdrawal($sum)) {
              $account_manager->updateAccount($current_account);
            } else {
              echo 'An error occured';
            }
          }

          // Transfer
          if(isset($_POST['transfer'], $_POST['sum'], $_POST['target_account']) && !empty($_POST['sum'])) {
            $sum = clean_sum($_POST['sum']);
            $id_target_account['id_account'] = sanitizeStr($_POST['target_account']);
            $target_account = new Account($id_target_account);
            $target_account = $account_manager->getAccount($target_account);

            $transfer_data = $current_account->transfer($sum, $target_account);
            if ($transfer_data) {
              $account_manager->updateAccount($transfer_data[0]);
              $account_manager->updateAccount($transfer_data[1]);
            } else {
              echo 'An error occured';
            }

          }

        } else {
            header('Location: home.php');
        }
        require '../view/account_details_v.php';

    } else {
        header('Location: home.php');
    }
} else {
    header('Location: home.php');
}
