<?php

class Cities extends \Phalcon\Mvc\Model
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
    protected $name;

    /**
     *
     * @var string
     */
    protected $eng_name;

    /**
     *
     * @var string
     */
    protected $region;

    /**
     *
     * @var string
     */
    protected $region_eng;

    /**
     *
     * @var integer
     */
    protected $country_id;

    /**
     *
     * @var integer
     */
    protected $with_data;

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
     * Method to set the value of field eng_name
     *
     * @param string $eng_name
     * @return $this
     */
    public function setEngName($eng_name)
    {
        $this->eng_name = $eng_name;

        return $this;
    }

    /**
     * Method to set the value of field region
     *
     * @param string $region
     * @return $this
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Method to set the value of field region_eng
     *
     * @param string $region_eng
     * @return $this
     */
    public function setRegionEng($region_eng)
    {
        $this->region_eng = $region_eng;

        return $this;
    }

    /**
     * Method to set the value of field country_id
     *
     * @param integer $country_id
     * @return $this
     */
    public function setCountryId($country_id)
    {
        $this->country_id = $country_id;

        return $this;
    }

    /**
     * Method to set the value of field with_data
     *
     * @param integer $with_data
     * @return $this
     */
    public function setWithData($with_data)
    {
        $this->with_data = $with_data;

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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field eng_name
     *
     * @return string
     */
    public function getEngName()
    {
        return $this->eng_name;
    }

    /**
     * Returns the value of field region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Returns the value of field region_eng
     *
     * @return string
     */
    public function getRegionEng()
    {
        return $this->region_eng;
    }

    /**
     * Returns the value of field country_id
     *
     * @return integer
     */
    public function getCountryId()
    {
        return $this->country_id;
    }

    /**
     * Returns the value of field with_data
     *
     * @return integer
     */
    public function getWithData()
    {
        return $this->with_data;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'name' => 'name', 
            'eng_name' => 'eng_name', 
            'region' => 'region', 
            'region_eng' => 'region_eng', 
            'country_id' => 'country_id',
            'with_data' => 'with_data'
        );
    }

}
