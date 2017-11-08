<?php
require_once '../model/data.php';
require_once '../services/services.php';

if(isset($_POST['disconnect'])) {
  session_destroy();
  header('Location: home.php');
}

if(isset($_POST['connect'], $_POST['user_name'], $_POST['password']) && !empty($_POST['user_name']) && !empty($_POST['password'])) {
  foreach ($_POST as $key => $value) {
    $connect_data[$key] = sanitizeStr($value);
  }
  $client_connect = new Client($connect_data);
  $client_connect = $client_manager->getClient($client_connect);
  if($client_connect && password_verify($connect_data['password'], $client_connect->getPassword())) {
    $_SESSION['client'] = $client_connect;
    header('Location: home.php');
  }
}

$header_form = new Form();

if (isset($_SESSION['client'])) {

  $header_form->addInputSubmit('disconnect', 'btn btn-primary', 'Disconnect');

  require '../view/home_v.php';
  
} else {

  $header_form->addInputText('User name', 'user_name', '', '', 'Your username');
  $header_form->addInputPassword('password', '');
  $header_form->addInputSubmit('connect', 'btn btn-primary', 'Connect');

  $new_client_form = new Form();
  $new_client_form->addInputText('First name', 'f_name', '', '', 'Max. 30 characters');
  $new_client_form->addInputText('Last name', 'l_name', '', '', 'Max. 30 characters');
  $new_client_form->addInputText('User name', 'user_name', '', '', 'Only alphanumeric');
  $new_client_form->addInputPassword('password', '');
  $new_client_form->addInputSubmit('create', 'btn btn-primary', 'Create');

  if(isset($_POST['create'], $_POST['f_name'], $_POST['l_name'], $_POST['user_name'], $_POST['password'])
      && !empty($_POST['f_name']) && !empty($_POST['l_name']) && !empty($_POST['user_name']) && !empty($_POST['user_name'])) {

    foreach ($_POST as $key => $value) {
      $sent_data[$key] = sanitizeStr($value);
    }
    if (strlen($sent_data['password']) > 0 && strlen($sent_data['password']) <=20 && preg_match('#^[a-zA-Z0-9]*$#', $sent_data['password'])) {
      $sent_data['password'] = password_hash($sent_data['password'], PASSWORD_BCRYPT);

      $client = new Client($sent_data);
    }


    echo $client_manager->createClient($client);

  }

  require '../view/new_client_v.php';
}

 ?>
