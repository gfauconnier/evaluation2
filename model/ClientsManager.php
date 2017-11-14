<?php

class ClientsManager {
  private $_db;

  // constructor just calls connection to database
  public function __construct($db)
  {
      $this->setDb($db);
  }

  //SETTER
  private function setDb(PDO $db)
  {
      $this->_db = $db;
  }

  // METHODS
// creates a client in db if it doesn't exist yet
  public function createClient(Client $client)
  {
    if (!$this->clientExists($client)) {

      try {

        $this->_db->beginTransaction();

        $query = $this->_db->prepare('INSERT INTO clients (f_name, l_name, user_name, password) VALUES (:f_name, :l_name, :user_name, :password)');

        $query->bindValue(':f_name', $client->getF_name(), PDO::PARAM_STR);
        $query->bindValue(':l_name', $client->getL_name(), PDO::PARAM_STR);
        $query->bindValue(':user_name', $client->getUser_name(), PDO::PARAM_STR);
        $query->bindValue(':password', $client->getPassword(), PDO::PARAM_STR);
        $query->execute();

        $this->_db->commit();

        return 'Client created';
      }
      catch(Exception $e) {
        $this->_db->rollback();
        return 'Error while trying to create client';
      }

    }

    return 'This username is already in use';
  }

// gets the client depending on sent id
  public function getClient(Client $client)
  {
    if ($this->clientExists($client)) {
      $query = $this->_db->query('SELECT * FROM clients WHERE user_name = \''.$client->getUser_name().'\'');
      $data = $query->fetch(PDO::FETCH_ASSOC);
      $client->hydrate($data);
      return $client;
    }
    return false;
  }

// verifies the user_name and password sent
  public function connectUser(Client $client)
  {

  }

// checks if the client exists
  public function clientExists(Client $client)
  {
    $query = $this->_db->query('SELECT * FROM clients WHERE user_name = \''.$client->getUser_name().'\'');
    $data = $query->fetch(PDO::FETCH_ASSOC);
    if ($data) {
        return true;
    } else {
        return false;
    }
  }
}
