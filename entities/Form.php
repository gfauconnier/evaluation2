<?php

class Form {
  protected $form;

// depending on sent parameters changes the action of the form
  public function __construct($cssclasses='')
  {
    $this->form = '<form method="post" action="" class="'.$cssclasses.'">';
  }

  /**
  * Get the value of Form
  *
  * @return mixed
  */
  public function getForm()
  {
    return $this->form;
  }

// adds an input text
  public function addInputText($labelname, $name, $cssclasses='', $value='', $placeholder='')
  {
    $this->form .= '<div class="">';
    $this->form .= '<label for="'.$name.'" class="">'.ucfirst($labelname).' : </label>';
    $this->form .= '<input type="text" id="'.$name.'" name ="'.$name.'" value="'.$value.'" class="'.$cssclasses.'" placeholder="'.$placeholder.'" required>';
    $this->form .= '</div>';
  }

  // adds an input password
    public function addInputPassword($name, $cssclasses='')
    {
      $this->form .= '<div class="">';
      $this->form .= '<label for="'.$name.'" class="">Password : </label>';
      $this->form .= '<input type="password" id="'.$name.'" name ="'.$name.'" class="'.$cssclasses.'" placeholder="Only alphanumeric" required>';
      $this->form .= '</div>';
    }

// adds a select + options
  public function addSelect($name, array $options, $cssclasses='')
  {
    $this->form .= '<div class=""><label for="'.$name.'" class="col-3">'.ucfirst(str_replace('_',' ',$name)).' : </label><select id="'.$name.'" name="'.$name.'" class="'.$cssclasses.'">';
    foreach ($options as $option) {
      $this->form .= '<option value="'.$option->getId_account().'">'.$option->getAccount_name().'</option>';
    }
    $this->form .= '</select></div>';
  }

// adds a hidden input
  public function addHidden($name, $value)
  {
    $this->form .= '<input type="hidden" name="'.$name.'" value="'.$value.'">';
  }

// adds a submit button and closes the form
  public function addInputSubmit($name, $cssclasses='', $value='')
  {
    $this->form .= '<button type="submit" class="'.$cssclasses.'" name="'.$name.'" title="'.ucfirst($name).'">'.$value.'</button>';
    $this->form .= '</form>';
  }

}


 ?>
