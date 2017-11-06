<?php
class Form {
  protected $form;

// depending on sent parameters changes the action of the form
  public function __construct($cssclasses='', array $action=[])
  {
    $formaction = '';
    if(count($action) == 1) {
      $formaction = $action[0].'.php';
    }
    elseif(count($action) == 2) {
      $formaction = $action[0].'.php?id='.$action[1];
    }

    $this->form = '<form method="post" action="'.$formaction.'" class="'.$cssclasses.'">';
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
  public function addInputText($name, $cssclasses='', $value='', $placeholder='')
  {
    $this->form .= '<div class="">';
    $this->form .= '<label for="'.$name.'" class="col-9 col-md-3">'.ucfirst($name).' : </label>';
    $this->form .= '<input type="text" id="'.$name.'" name ="'.$name.'" value="'.$value.'" class="'.$cssclasses.'" placeholder="'.$placeholder.'" required>';
    $this->form .= '</div>';
  }

  // adds an input password
    public function addInputPassword($name, $cssclasses='')
    {
      $this->form .= '<div class="">';
      $this->form .= '<label for="'.$name.'" class="col-9 col-md-3">Password : </label>';
      $this->form .= '<input type="password" id="'.$name.'" name ="'.$name.'" value="'.$value.'" class="'.$cssclasses.'" placeholder="Password" required>';
      $this->form .= '</div>';
    }

// adds a select + options
  public function addSelect($name, array $options, $cssclasses='')
  {
    $this->form .= '<div class=""><label for="'.$name.'" class="col-3">'.ucfirst($name).' : </label><select id="'.$name.'" name="'.$name.'" class="'.$cssclasses.'">';
    foreach ($options as $option) {
      $this->form .= '<option value="'.$option.'">'.ucfirst($option).'</option>';
    }
    $this->form .= '</select></label></div>';
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
