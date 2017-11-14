<?php

trait GetAttributes {
  // Returns an array containing all the class attributes
  public function getAttributes()
  {
      foreach ($this as $key => $value) {
          $data[$key] = $value;
      }
      return $data;
  }
}

 ?>
