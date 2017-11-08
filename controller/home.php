<?php
require_once '../model/data.php';
require_once '../services/services.php';

if (isset($_SESSION['client'])) {
  require '../view/home_v.php';
} else {
  $new_client_form = new Form();
  $new_client_form->addInputText('First name', 'f_name', '', '', 'Max. 30 characters');
  $new_client_form->addInputText('Last name', 'l_name', '', '', 'Max. 30 characters');
  $new_client_form->addInputText('User name', 'user_name', '', '', 'Only alphanumeric');
  $new_client_form->addInputPassword('password', '');
  $new_client_form->addInputSubmit('create', 'btn-primary', 'Create');

  if(isset($_POST['create'], $_POST['f_name'], $_POST['l_name'], $_POST['user_name'], $_POST['password'])
      && !empty($_POST['f_name']) && !empty($_POST['l_name']) && !empty($_POST['user_name']) && !empty($_POST['user_name'])) {

    foreach ($_POST as $key => $value) {
      $sent_data[$key] = sanitizeStr($value);
    }

    $client = new Client($sent_data);


    echo $client_manager->createClient($client);

  }

  require '../view/new_client_v.php';
}

 ?>
