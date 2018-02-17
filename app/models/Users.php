<?php

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class Users extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Identity
     * @Column(column="user_id", type="integer", nullable=false)
     */
    protected $user_id;

    /**
     *
     * @var string
     * @Column(column="name", type="string", nullable=true)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(column="email", type="string", nullable=false)
     */
    protected $email;

    /**
     *
     * @var string
     * @Column(column="password", type="string", length=70, nullable=false)
     */
    protected $password;

    /**
     *
     * @var string
     * @Column(column="reg_dttm", type="string", nullable=false)
     */
    protected $reg_dttm;

    /**
     *
     * @var string
     * @Column(column="approved_email", type="string", nullable=true)
     */
    protected $approved_email;

    /**
     *
     * @var string
     * @Column(column="approved_email_code", type="string", nullable=true)
     */
    protected $approved_email_code;

    /**
     *
     * @var string
     * @Column(column="is_active", type="string", nullable=true)
     */
    protected $is_active;

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
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

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
     * Method to set the value of field reg_dttm
     *
     * @param string $reg_dttm
     * @return $this
     */
    public function setRegDttm($reg_dttm)
    {
        $this->reg_dttm = $reg_dttm;

        return $this;
    }

    /**
     * Method to set the value of field approved_email
     *
     * @param string $approved_email
     * @return $this
     */
    public function setApprovedEmail($approved_email)
    {
        $this->approved_email = $approved_email;

        return $this;
    }

    /**
     * Method to set the value of field approved_email_code
     *
     * @param string $approved_email_code
     * @return $this
     */
    public function setApprovedEmailCode($approved_email_code)
    {
        $this->approved_email_code = $approved_email_code;

        return $this;
    }

    /**
     * Method to set the value of field is_active
     *
     * @param string $is_active
     * @return $this
     */
    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;

        return $this;
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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
     * Returns the value of field reg_dttm
     *
     * @return string
     */
    public function getRegDttm()
    {
        return $this->reg_dttm;
    }

    /**
     * Returns the value of field approved_email
     *
     * @return string
     */
    public function getApprovedEmail()
    {
        return $this->approved_email;
    }

    /**
     * Returns the value of field approved_email_code
     *
     * @return string
     */
    public function getApprovedEmailCode()
    {
        return $this->approved_email_code;
    }

    /**
     * Returns the value of field is_active
     *
     * @return string
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("public");
    }

    public function getSequenceName()
    {
        return 'users_seq';
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return "users";
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]|Users|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
