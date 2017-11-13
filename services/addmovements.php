<?php

function addMovement($id_account, $sum) {

  $movement_data['id_account'] = $id_account;
  $movement_data['movement_value'] = $sum;
  $movement = new Movement($movement_data);
  return $movement;

}
