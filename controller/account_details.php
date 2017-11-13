<?php

require_once '../model/data.php';
require_once '../services/services.php';

if (isset($_POST['disconnect'])) {
    disconnection();
}

if (isset($_SESSION['client'])) {
    $connected_client = new Client($_SESSION['client']);
    if (isset($_GET['id_account'])) {
        $id_account['id_account'] = sanitizeStr($_GET['id_account']);
        $current_account = new Account($id_account);
        $current_account = $account_manager->getAccount($current_account);


        if ($current_account) {
            $header_form = new Form();
            $header_form->addInputSubmit('disconnect', 'btn btn-primary', 'Disconnect');

            if (isset($_POST['create'], $_POST['account_name']) && !empty($_POST['account_name'])) {
                $data['account_name'] = sanitizeStr($_POST['account_name']);
                $data['id_client'] = $connected_client->getId_client();
                $new_account = new Account($data);

                $message[] = $account_manager->createAccount($new_account);
            }
            $new_account_form = new Form();
            $new_account_form->addInputText('Account name', 'account_name', '', '', 'Max. 50 characters');
            $new_account_form->addInputSubmit('create', 'btn btn-primary', 'Create');

            // creates a form for deposits
            $deposit_form = new Form();
            $deposit_form->addInputText('Sum', 'sum', '', '', 'Sum to deposit');
            $deposit_form->addInputSubmit('deposit', 'btn btn-primary', 'Deposit');

            // creates a form for withdrawals
            $withdraw_form = new Form();
            $withdraw_form->addInputText('Sum', 'sum', '', '', 'Sum to withdraw');
            $withdraw_form->addInputSubmit('withdraw', 'btn btn-primary', 'Withdraw');

            // creates a form for transfers
            $owned_accounts = $account_manager->getAllAccounts($connected_client, $current_account->getId_account());
            $transfer_form = new Form();
            $transfer_form->addInputText('Sum', 'sum', '', '', 'Sum to transfer');
            $transfer_form->addSelect('target_account', $owned_accounts);
            $transfer_form->addInputSubmit('transfer', 'btn btn-primary', 'Transfer');

            // creates a delete form
            $delete_form = new Form('delete_form');
            $delete_form->addHidden('id_account', $current_account->getId_account());
            $delete_form->addInputSubmit('delete', 'btn btn-danger', 'Delete this account');


            // deposit
            if (isset($_POST['deposit'], $_POST['sum']) && !empty($_POST['sum'])) {
                $sum = clean_sum($_POST['sum']);
                if ($current_account->deposit($sum)) {
                    $account_manager->updateAccount($current_account);
                    $movement = addMovement($current_account->getId_account(), $sum);
                    $movement_manager->createMovement($movement);
                } else {
                    $message[] = 'An error occured';
                }
            }

            // widthdrawal
            if (isset($_POST['withdraw'], $_POST['sum']) && !empty($_POST['sum'])) {
                $sum = clean_sum($_POST['sum']);
                if ($current_account->withdrawal($sum)) {
                    $account_manager->updateAccount($current_account);
                    $sum = 0 - $sum;
                    $movement = addMovement($current_account->getId_account(), $sum);
                    $movement_manager->createMovement($movement);
                } else {
                    $message[] = 'An error occured';
                }
            }

            // Transfer
            if (isset($_POST['transfer'], $_POST['sum'], $_POST['target_account']) && !empty($_POST['sum'])) {
                $sum = clean_sum($_POST['sum']);
                $id_target_account['id_account'] = sanitizeStr($_POST['target_account']);
                $target_account = new Account($id_target_account);
                $target_account = $account_manager->getAccount($target_account);

                $transfer_data = $current_account->transfer($sum, $target_account);
                if ($transfer_data) {
                    $account_manager->updateAccount($transfer_data[0]);
                    $movement = addMovement($transfer_data[0]->getId_account(), $sum);
                    $movement_manager->createMovement($movement);
                    $account_manager->updateAccount($transfer_data[1]);
                    $sum = 0 - $sum;
                    $movement = addMovement($transfer_data[1]->getId_account(), $sum);
                    $movement_manager->createMovement($movement);
                } else {
                    $message[] = 'An error occured';
                }
            }
            // Delete
            if (isset($_POST['delete'], $_POST['id_account'])) {
                $data['id_account'] = sanitizeStr($_POST['id_account']);
                $todelete_account = new Account($data);
                $message[] = $account_manager->deleteAccount($todelete_account);
                header('Location: '.$_SERVER['PHP_SELF']);
            }


            $account_movements = $movement_manager->getMovements($current_account);
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
