<?php

class Talons extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $value;

    /**
     *
     * @var integer
     */
    protected $lot_id;

    /**
     *
     * @var integer
     */
    protected $user_id;

    /**
     *
     * @var string
     */
    protected $identifier;

    /**
     *
     * @var string
     */
    protected $regtime;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field value
     *
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Method to set the value of field lot_id
     *
     * @param integer $lot_id
     * @return $this
     */
    public function setLotId($lot_id)
    {
        $this->lot_id = $lot_id;

        return $this;
    }

    /**
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Method to set the value of field identifier
     *
     * @param string $identifier
     * @return $this
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Method to set the value of field regtime
     *
     * @param string $regtime
     * @return $this
     */
    public function setRegtime($regtime)
    {
        $this->regtime = $regtime;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns the value of field lot_id
     *
     * @return integer
     */
    public function getLotId()
    {
        return $this->lot_id;
    }

    /**
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the value of field identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Returns the value of field regtime
     *
     * @return string
     */
    public function getRegtime()
    {
        return $this->regtime;
    }

    public function initialize(){
    	$this->belongsTo('lot_id', 'Lots', 'id', array(
    												'alias' => 'lot',
    												'reusable' => true
    											));
        $this->belongsTo('user_id', 'Users', 'id', array(
                                                    'alias' => 'user',
                                                    'reusable' => true
                                                ));
    }

    public function getCustomersCountByLotId($lotId){
        $phql = 'SELECT COUNT(DISTINCT user_id) AS ccount FROM Talons WHERE lot_id = ' . (int) $lotId;
        
        $rows = $this->getModelsManager()->executeQuery($phql);

        foreach ($rows as $row) {
            return $row->ccount;
        }
    }

    public function getLotIdsByUser($userId) {
        $phql = 'SELECT DISTINCT lot_id FROM Talons WHERE lot_id IS NOT NULL AND user_id = ' . (int) $userId . 'ORDER BY lot_id';
        $rows = $this->getModelsManager()->executeQuery($phql)->toArray(); 
        $ids = array();
        foreach ($rows as $row) {
            $ids[] = $row['lot_id'];
        }
        return $ids;
    }
}
