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
// creates a client in db if it deosn't exist yet
  public function createClient(Client $client)
  {

  }

// gets the client depending on sent id   possible trait
  public function getClient(Client $client)
  {
    if ($this->clientExists($client)) {
      $query = $this->_db->query('SELECT * FROM clients WHERE id_client = '.$client->$id);
      $data = $query->fetch(PDO::FETCH_ASSOC);
      $client->hydrate($data);
      return $client;
    }
    return false;
  }

// possible trait
  public function clientExists(Client $client)
  {

  }
}
