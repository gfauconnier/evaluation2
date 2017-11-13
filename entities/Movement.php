<?php

class Movement
{
    protected $id_movement;
    protected $id_account;
    protected $movement_value;
    protected $movement_date;


    use Hydrate;

    // Contructor
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // GETTERS AND SETTERS
    /**
     * Get the value of Id Movement
     *
     * @return mixed
     */
    public function getId_movement()
    {
        return $this->id_movement;
    }

    /**
     * Set the value of Id Movement
     *
     * @param mixed id_movement
     *
     */
    public function setId_movement($id_movement)
    {
        $id_movement = (int) $id_movement;
        if (is_int($id_movement) && $id_movement > 0) {
            $this->id_movement = $id_movement;
        }
    }

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
     * Get the value of Movement Value
     *
     * @return mixed
     */
    public function getMovement_value()
    {
        return $this->movement_value;
    }

    /**
     * Set the value of Movement Value
     *
     * @param mixed movement_value
     *
     */
    public function setMovement_value($movement_value)
    {
        if (is_numeric($movement_value)) {
            $this->movement_value = $movement_value;
        }
    }

    /**
     * Get the value of Movement Date
     *
     * @return mixed
     */
    public function getMovement_date()
    {
        return $this->movement_date;
    }

    /**
     * Set the value of Movement Date
     *
     * @param mixed movement_date
     *
     */
    public function setMovement_date($movement_date)
    {
        $this->movement_date = $movement_date;
    }
}
