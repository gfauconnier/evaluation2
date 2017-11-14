<?php

class Account {
  protected $id_account;
  protected $id_client;
  protected $account_name;
  protected $balance;

  use Hydrate;
  use GetAttributes;

  // Contructor
    public function __construct(array $data)
    {
      $this->hydrate($data);
    }

  // GETTERS AND SETTERS
    /**
     * Get the value of Id Account
     *
     * @return mixed
     */
    public function getId_account()
    {
        return $this->id_account;
    }
    /**
    * Set the value of Id Account
    *
    * @param mixed id_account
    *
    */
    public function setId_account($id_account)
    {
      $id_account = (int) $id_account;
      if (is_int($id_account) && $id_account > 0) {
        $this->id_account = $id_account;
      }
    }

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
     * Get the value of Account Name
     *
     * @return mixed
     */
    public function getAccount_name()
    {
        return $this->account_name;
    }
    /**
    * Set the value of Account Name
    *
    * @param mixed account_name
    *
    */
    public function setAccount_name($account_name)
    {
      if(strlen($account_name) <= 30 && strlen($account_name) > 0 && preg_match('#^[a-zA-Z0-9]*$#', $account_name)) {
        $this->account_name = $account_name;
      }
    }

    /**
     * Get the value of Balance
     *
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
    * Set the value of Balance
    *
    * @param mixed balance
    *
    */
    public function setBalance($balance)
    {
      if(is_numeric($balance)) {
        $this->balance = $balance;
      }
    }

    // METHODS
    // Changes the balance (+) depending on sent value
    public function deposit($value)
    {
      if (is_numeric($value)) {
        $value += $this->balance;
        $this->setBalance($value);
        return $this;
      }
      return false;
    }

    // Changes the balance (-) depending on sent value
    public function withdrawal($value)
    {
      if (is_numeric($value)) {
        $value = $this->balance - $value;
        $this->setBalance($value);
        if($this->balance >= -300) {
          return $this;
        }
      }
      return false;
    }

    // makes a widthdrawal on current account and a deposit on sent account
    public function transfer($value, Account $target_account)
    {
      if (is_numeric($value) && ($this->balance - $value)>= -300) {
        $transferred[] = $this->withdrawal($value);
        $transferred[] = $target_account->deposit($value);
        return $transferred;
      }
      return false;
    }

  }
