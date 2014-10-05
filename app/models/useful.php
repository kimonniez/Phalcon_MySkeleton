<?php 
//Use namespaces
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;



//Validate some fields
public function validation() {
        $this->validate(new EmailValidator(array(
            'field' => 'mail'
        )));
        $this->validate(new UniquenessValidator(array(
            'field' => 'mail',
            'message' => 'Sorry, The email was registered by another user'
        )));        
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }


//Get relations with another tables
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


//Get rows count
public function getCustomersCountByLotId($lotId){
        $phql = 'SELECT COUNT(DISTINCT user_id) AS ccount FROM Talons WHERE lot_id = ' . (int) $lotId;
        
        $rows = $this->getModelsManager()->executeQuery($phql);

        foreach ($rows as $row) {
            return $row->ccount;
        }
    }
