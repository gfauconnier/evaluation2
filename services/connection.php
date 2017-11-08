<?php

function connection(array $data)
{
  foreach ($data as $key => $value) {
    $connect_data[$key] = sanitizeStr($value);
  }
  $client_connect = new Client($connect_data);
  $client_connect = $client_manager->getClient($client_connect);
  if($client_connect && password_verify($connect_data['password'], $client_connect->getPassword())) {
    $_SESSION['client'] = $client_connect;
    header('Location: home.php');
  }
}

function disconnection()
{
  session_destroy();
  header('Location: home.php');
}
