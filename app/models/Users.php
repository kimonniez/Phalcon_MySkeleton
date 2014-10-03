<?php
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;

class Users extends \Phalcon\Mvc\Model
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
    protected $login;

    /**
     *
     * @var string
     */
    protected $password;

    /**
     *
     * @var string
     */
    protected $mail;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $surname;

    /**
     *
     * @var string
     */
    protected $patronymic;

    /**
     *
     * @var string
     */
    protected $dob;

    /**
     *
     * @var integer
     */
    protected $city_id;

    /**
     *
     * @var integer
     */
    protected $money;

    /**
     *
     * @var string
     */
    protected $vkid;

    /**
     *
     * @var string
     */
    protected $fbid;

    /**
     *
     * @var string
     */
    protected $gpid;

    /**
     *
     * @var string
     */
    protected $twid;

    /**
     *
     * @var string
     */
    protected $okid;

    /**
     *
     * @var string
     */
    protected $yaid;

    /**
     *
     * @var integer
     */
    protected $registration_time;

    /**
     *
     * @var integer
     */
    protected $validation_time;

    /**
     *
     * @var integer
     */
    protected $is_validate;

    /**
     *
     * @var integer
     */
    protected $is_legal;

    /**
     *
     * @var string
     */
    protected $validation_string;

    /**
     *
     * @var integer
     */
    protected $renewrequest_time;

    /**
     *
     * @var string
     */
    protected $renewpass_string;

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
     * Method to set the value of field login
     *
     * @param string $login
     * @return $this
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Method to set the value of field mail
     *
     * @param string $mail
     * @return $this
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field surname
     *
     * @param string $surname
     * @return $this
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Method to set the value of field patronymic
     *
     * @param string $patronymic
     * @return $this
     */
    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    /**
     * Method to set the value of field dob
     *
     * @param string $dob
     * @return $this
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Method to set the value of field city_id
     *
     * @param integer $city_id
     * @return $this
     */
    public function setCityId($city_id)
    {
        $this->city_id = $city_id;

        return $this;
    }

    /**
     * Method to set the value of field money
     *
     * @param integer $money
     * @return $this
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Method to set the value of field vkid
     *
     * @param string $vkid
     * @return $this
     */
    public function setVkid($vkid)
    {
        $this->vkid = $vkid;

        return $this;
    }

    /**
     * Method to set the value of field fbid
     *
     * @param string $fbid
     * @return $this
     */
    public function setFbid($fbid)
    {
        $this->fbid = $fbid;

        return $this;
    }

    /**
     * Method to set the value of field gpid
     *
     * @param string $gpid
     * @return $this
     */
    public function setGpid($gpid)
    {
        $this->gpid = $gpid;

        return $this;
    }

    /**
     * Method to set the value of field twid
     *
     * @param string $twid
     * @return $this
     */
    public function setTwid($twid)
    {
        $this->twid = $twid;

        return $this;
    }

    /**
     * Method to set the value of field okid
     *
     * @param string $okid
     * @return $this
     */
    public function setOkid($okid)
    {
        $this->okid = $okid;

        return $this;
    }

    /**
     * Method to set the value of field yaid
     *
     * @param string $yaid
     * @return $this
     */
    public function setYaid($yaid)
    {
        $this->yaid = $yaid;

        return $this;
    }

    /**
     * Method to set the value of field registration_time
     *
     * @param integer $registration_time
     * @return $this
     */
    public function setRegistrationTime($registration_time)
    {
        $this->registration_time = $registration_time;

        return $this;
    }

    /**
     * Method to set the value of field validation_time
     *
     * @param integer $validation_time
     * @return $this
     */
    public function setValidationTime($validation_time)
    {
        $this->validation_time = $validation_time;

        return $this;
    }

    /**
     * Method to set the value of field is_validate
     *
     * @param integer $is_validate
     * @return $this
     */
    public function setIsValidate($is_validate)
    {
        $this->is_validate = $is_validate;

        return $this;
    }

    /**
     * Method to set the value of field is_legal
     *
     * @param integer $is_legal
     * @return $this
     */
    public function setIsLegal($is_legal)
    {
        $this->is_legal = $is_legal;

        return $this;
    }

    /**
     * Method to set the value of field validation_string
     *
     * @param string $validation_string
     * @return $this
     */
    public function setValidationString($validation_string)
    {
        $this->validation_string = $validation_string;

        return $this;
    }

    /**
     * Method to set the value of field renewrequest_time
     *
     * @param integer $renewrequest_time
     * @return $this
     */
    public function setRenewrequestTime($renewrequest_time)
    {
        $this->renewrequest_time = $renewrequest_time;

        return $this;
    }

    /**
     * Method to set the value of field renewpass_string
     *
     * @param string $renewpass_string
     * @return $this
     */
    public function setRenewpassString($renewpass_string)
    {
        $this->renewpass_string = $renewpass_string;

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
     * Returns the value of field login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field surname
     *
     * @return string
     */
    public function getSurname() 
    {
        return $this->surname;
    }

    /**
     * Returns the value of field dob
     *
     * @return string
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Returns the value of field city_id
     *
     * @return integer
     */
    public function getCityId()
    {
        return $this->city_id;
    }

    /**
     * Returns the value of field money
     *
     * @return integer
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Returns the value of field vkid
     *
     * @return string
     */
    public function getVkid()
    {
        return $this->vkid;
    }

    /**
     * Returns the value of field fbid
     *
     * @return string
     */
    public function getFbid()
    {
        return $this->fbid;
    }

    /**
     * Returns the value of field gpid
     *
     * @return string
     */
    public function getGpid()
    {
        return $this->gpid;
    }

    /**
     * Returns the value of field twid
     *
     * @return string
     */
    public function getTwid()
    {
        return $this->twid;
    }

    /**
     * Returns the value of field okid
     *
     * @return string
     */
    public function getOkid()
    {
        return $this->okid;
    }

    /**
     * Returns the value of field yaid
     *
     * @return string
     */
    public function getYaid()
    {
        return $this->yaid;
    }

    /**
     * Returns the value of field registration_time
     *
     * @return integer
     */
    public function getRegistrationTime()
    {
        return $this->registration_time;
    }

    /**
     * Returns the value of field validation_time
     *
     * @return integer
     */
    public function getValidationTime()
    {
        return $this->validation_time;
    }

    /**
     * Returns the value of field is_validate
     *
     * @return integer
     */
    public function getIsValidate()
    {
        return $this->is_validate;
    }

    /**
     * Returns the value of field is_legal
     *
     * @return integer
     */
    public function getIsLegal()
    {
        return $this->is_legal;
    }

    /**
     * Returns the value of field validation_string
     *
     * @return string
     */
    public function getValidationString()
    {
        return $this->validation_string;
    }

    /**
     * Returns the value of field renewrequest_time
     *
     * @return integer
     */
    public function getRenewrequestTime()
    {
        return $this->renewrequest_time;
    }

    /**
     * Returns the value of field renewpass_string
     *
     * @return string
     */
    public function getRenewpassString()
    {
        return $this->renewpass_string;
    }
    public function initialize() {
        $this->hasMany("id", "Images", "owner_id", array(
                                                'alias' => 'image',
                                                'reusable' => true
                ));
    }
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

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'login' => 'login', 
            'password' => 'password', 
            'mail' => 'mail', 
            'name' => 'name', 
            'surname' => 'surname',
            'patronymic' => 'patronymic',
            'dob' => 'dob', 
            'city_id' => 'city_id', 
            'money' => 'money', 
            'vkid' => 'vkid', 
            'fbid' => 'fbid', 
            'gpid' => 'gpid', 
            'twid' => 'twid', 
            'okid' => 'okid', 
            'yaid' => 'yaid', 
            'registration_time' => 'registration_time', 
            'validation_time' => 'validation_time', 
            'is_validate' => 'is_validate', 
            'is_legal' => 'is_legal', 
            'validation_string' => 'validation_string', 
            'renewrequest_time' => 'renewrequest_time', 
            'renewpass_string' => 'renewpass_string'
        );
    }

}
