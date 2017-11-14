<?php

class MovementsManager {
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
  // adds a movement to db
  public function createMovement(Movement $movement)
  {
    $query = $this->_db->prepare('INSERT INTO movements (id_account, movement_value) VALUES (:id_account, :movement_value)');

    $query->bindValue(':id_account', $movement->getId_account(), PDO::PARAM_INT);
    $query->bindValue(':movement_value', $movement->getMovement_value());
    $query->execute();
  }

  // get last 10 movements for the account
  public function getMovements(Account $account)
  {
    $query = $this->_db->prepare('SELECT * FROM movements WHERE id_account = :id_account ORDER BY movement_date DESC LIMIT 10');
    $query->bindValue(':id_account', $account->getId_account(), PDO::PARAM_INT);
    $query->execute();
    $movements = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($movements as $key => $movement) {
      $movements[$key] = new Movement($movement);
    }
    return $movements;
  }
}
