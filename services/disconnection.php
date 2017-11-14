<?php

function disconnection()
{
  session_destroy();
  header('Location: home.php');
}
