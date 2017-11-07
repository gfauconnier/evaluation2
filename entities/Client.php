<?php

class Client {

  protected $id_client;
  protected $f_name;
  protected $l_name;
  protected $user_name;
  protected $password;

use Hydrate;

// Contructor
  public function __construct(array $data)
  {
    $this->hydrate($data);
  }

// GETTERS AND SETTERS
    /**
     * Get the value of Id Client
     *
     * @return mixed
     */
    public function getId_client()
    {
        return $this->id_client;
    }
    /**
    * Set the value of Id Client
    *
    * @param mixed id_client
    *
    */
    public function setId_client($id_client)
    {
      $id_client = (int) $id_client;
      if (is_int($id_client) && $id_client > 0) {
        $this->id_client = $id_client;
      }
    }

    /**
     * Get the value of f Name
     *
     * @return mixed
     */
    public function getF_name()
    {
        return $this->f_name;
    }
    /**
    * Set the value of f Name
    *
    * @param mixed f_name
    *
    */
    public function setF_name($f_name)
    {
      if(strlen($f_name) <= 30 && strlen($f_name) > 0) {
        $this->f_name = $f_name;
      }
    }

    /**
     * Get the value of l Name
     *
     * @return mixed
     */
    public function getL_name()
    {
        return $this->l_name;
    }
    /**
    * Set the value of l Name
    *
    * @param mixed l_name
    *
    */
    public function setL_name($l_name)
    {
      if(strlen($l_name) <= 30 && strlen($l_name) > 0) {
        $this->l_name = $l_name;
      }
    }

    /**
     * Get the value of Username
     *
     * @return mixed
     */
    public function getUser_name()
    {
        return $this->user_name;
    }
    /**
    * Set the value of Username
    *
    * @param mixed username
    *
    */
    public function setUser_name($user_name)
    {
      if(strlen($user_name) <= 20 && strlen($user_name) > 0) {
        $this->user_name = $user_name;
      }
    }

    /**
     * Get the value of Password
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
    * Set the value of Password
    *
    * @param mixed password
    *
    */
    public function setPassword($password)
    {
      if(strlen($password) <= 50 && strlen($password) > 0) {
        $this->password = $password;
      }
    }

  }
