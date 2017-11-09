<?php
function clean_sum($sum) {
  $sum = sanitizeStr($_POST['sum']);
  $sum = str_replace(',', '.', $sum);
  return $sum;
}


 ?>
