<?php

class AccountsManager
{
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

    // creates a new account
    public function createAccount(Account $account)
    {
        try {
            $this->_db->beginTransaction();

            $query = $this->_db->prepare('INSERT INTO accounts (id_client, account_name) VALUES (:id_client, :account_name)');

            $query->bindValue(':id_client', $account->getId_client(), PDO::PARAM_INT);
            $query->bindValue(':account_name', $account->getAccount_name(), PDO::PARAM_STR);
            $query->execute();

            $this->_db->commit();

            return 'Account created';
        } catch (Exception $e) {
            $this->_db->rollback();
            return 'Error while trying to create account';
        }
    }

    // gets the account depending on sent id
    public function getAccount(Account $account)
    {
        if ($this->accountExists($account)) {
            $query = $this->_db->query('SELECT * FROM accounts WHERE id_client = \''.$account->getId_client().'\' OR id_account = \''.$account->getId_account().'\'');
            $data = $query->fetch(PDO::FETCH_ASSOC);
            $account->hydrate($data);
            return $account;
        }
        return false;
    }

    // gets all accounts owned by the Client
    public function getAllAccounts(Client $client, $except='')
    {
        if($except != '') {
          $except = ' AND id_account != '.$except;
        }
        $query = $this->_db->query('SELECT * FROM accounts WHERE id_client = \''.$client->getId_client().'\''.$except);
        $accounts = $query->fetchAll(PDO::FETCH_ASSOC);
        // creates a new Account per query answer
        foreach ($accounts as $key => $account) {
            $accounts[$key] = new Account($account);
        }
        return $accounts;
    }


    // Updates the account Balance
    public function updateAccount(Account $account)
    {
        if ($this->accountExists($account)) {
            try {
                $this->_db->beginTransaction();
echo $account->getBalance();
                $query = $this->_db->prepare('UPDATE accounts SET balance = :balance WHERE id_account = :id');
                $query->bindValue(':id', $account->getId_account(), PDO::PARAM_INT);
                $query->bindValue(':balance', $account->getBalance());
                $query->execute();

                $this->_db->commit();

                return 'Account updated';
            } catch (Exception $e) {
                $this->_db->rollback();
                return 'Error while trying to update account';
            }
        }
    }

    // checks if the account exists
    public function accountExists(Account $account)
    {
        $query = $this->_db->query('SELECT * FROM accounts WHERE id_client = \''.$account->getId_client().'\' OR id_account = \''.$account->getId_account().'\'');
        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}
