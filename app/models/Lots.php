<?php

class Lots extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $category_id;

    /**
     *
     * @var string
     */
    protected $category_name;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var integer
     */
    protected $talons_count;

    /**
     *
     * @var integer
     */
    protected $customers_count;

    /**
     *
     * @var integer
     */
    protected $price;

    /**
     *
     * @var integer
     */
    protected $talon_price;

    /**
     *
     * @var integer
     */
    protected $time_start;

    /**
     *
     * @var integer
     */
    protected $time_end;

    /**
     *
     * @var integer
     */
    protected $user_id;

    /**
     *
     * @var string
     */
    protected $description;

    /**
     *
     * @var string
     */
    protected $brief;

    /**
     *
     * @var integer
     */
    protected $city_id;

    /**
     *
     * @var integer
     */
    protected $weathercity_id;

    /**
     *
     * @var string
     */
    protected $images;

    /**
     *
     * @var integer
     */
    protected $is_editable;

    /**
     *
     * @var integer
     */
    protected $is_active;

    /**
     *
     * @var integer
     */
    protected $is_double;


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
     * Method to set the value of field category_id
     *
     * @param integer $category_id
     * @return $this
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Method to set the value of field category_name
     *
     * @param string $category_name
     * @return $this
     */
    public function setCategoryName($category_name)
    {
        $this->category_name = $category_name;

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
     * Method to set the value of field talons_count
     *
     * @param integer $talons_count
     * @return $this
     */
    public function setTalonsCount($talons_count)
    {
        $this->talons_count = $talons_count;

        return $this;
    }

    /**
     * Method to set the value of field customers_count
     *
     * @param integer $customers_count
     * @return $this
     */
    public function setCustomersCount($customers_count)
    {
        $this->customers_count = $customers_count;

        return $this;
    }

    /**
     * Method to set the value of field price
     *
     * @param integer $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Method to set the value of field talon_price
     *
     * @param integer $talon_price
     * @return $this
     */
    public function setTalonPrice($talon_price)
    {
        $this->talon_price = $talon_price;

        return $this;
    }

    /**
     * Method to set the value of field time_start
     *
     * @param integer $time_start
     * @return $this
     */
    public function setTimeStart($time_start)
    {
        $this->time_start = $time_start;

        return $this;
    }

    /**
     * Method to set the value of field time_end
     *
     * @param integer $time_end
     * @return $this
     */
    public function setTimeEnd($time_end)
    {
        $this->time_end = $time_end;

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
     * Method to set the value of field description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Method to set the value of field brief
     *
     * @param string $brief
     * @return $this
     */
    public function setBrief($brief)
    {
        $this->brief = $brief;

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
     * Method to set the value of field weathercity_id
     *
     * @param integer $weathercity_id
     * @return $this
     */
    public function setWeathercityId($weathercity_id)
    {
        $this->weathercity_id = $weathercity_id;

        return $this;
    }

    /**
     * Method to set the value of field images
     *
     * @param string $images
     * @return $this
     */
    public function setImages($images)
    {
        $this->images = base64_encode($images);

        return $this;
    }

    /**
     * Method to set the value of field is_editable
     *
     * @param integer $is_editable
     * @return $this
     */
    public function setIsEditable($is_editable)
    {
        $this->is_editable = $is_editable;

        return $this;
    }

    /**
     * Method to set the value of field is_active
     *
     * @param integer $is_editable
     * @return $this
     */
    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;

        return $this;
    }

    /**
     * Method to set the value of field is_double
     *
     * @param integer $is_editable
     * @return $this
     */
    public function setIsDouble($is_double)
    {
        $this->is_double = $is_double;

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
     * Returns the value of field category_id
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Returns the value of field category_name
     *
     * @return string
     */
    public function getCategoryName()
    {
        return $this->category_name;
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
     * Returns the value of field talons_count
     *
     * @return integer
     */
    public function getTalonsCount()
    {
        return $this->talons_count;
    }

    /**
     * Returns the value of field customers_count
     *
     * @return integer
     */
    public function getCustomersCount()
    {
        return $this->customers_count;
    }

    /**
     * Returns the value of field price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns the value of field talon_price
     *
     * @return integer
     */
    public function getTalonPrice()
    {
        return $this->talon_price;
    }

    /**
     * Returns the value of field time_start
     *
     * @return integer
     */
    public function getTimeStart()
    {
        return $this->time_start;
    }

    /**
     * Returns the value of field time_end
     *
     * @return integer
     */
    public function getTimeEnd()
    {
        return $this->time_end;
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
     * Returns the value of field description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the value of field brief
     *
     * @return string
     */
    public function getBrief()
    {
        return $this->brief;
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
     * Returns the value of field weathercity_id
     *
     * @return integer
     */
    public function getWeathercityId()
    {
        return $this->weathercity_id;
    }

    /**
     * Returns the value of field images
     *
     * @return string
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Returns the value of field is_editable
     *
     * @return integer
     */

    public function getIsEditable()
    {
        return $this->is_editable;
    }

    /**
     * Returns the value of field is_active
     *
     * @return integer
     */

    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Returns the value of field is_double
     *
     * @return integer
     */

    public function getIsDouble()
    {
        return $this->is_double;
    }

    public function setTalonsPrice($talons_price)
    {
        $this->talons_price = $talons_price;

        return $this;
    }

    public function getTalonsPrice()
    {
        return $this->talons_price;
    }

    public function setCouponsCount($coupons_count)
    {
        $this->coupons_count = $coupons_count;

        return $this;
    }

    public function setCouponPrice($coupon_price)
    {
        $this->coupon_price = $coupon_price;

        return $this;
    }

    public function getCouponsCount()
    {
        return $this->coupons_count;
    }

    public function getCouponPrice()
    {
        return $this->coupon_price;
    }

    public function getLotsByPage($page = 1, $categoryId = NULL, $query = NULL){
        $builder = $this->getModelsManager()->createBuilder()
        ->columns('*')
        ->from('Lots')
        ->where('is_active = 1');
        //die(print_r($categoryId));
        if ($categoryId !== NULL) {
            if(is_array($categoryId)){
                $builder->where('category_id IN (' . (int) trim(implode("," , $categoryId)) . ') AND is_active = 1' );
            } else {
                $builder->where('category_id = :categoryId: AND is_active = 1', array('categoryId' => (int) $categoryId));
            }
        }
        if ($query !== NULL) { 
            $builder->where("name LIKE '%".$query."%' OR brief LIKE  '%".$query."%' OR description LIKE  '%".$query."%'  AND is_active = 1");
        }

        $paginator = new Phalcon\Paginator\Adapter\QueryBuilder(array(
            "builder" => $builder,
            "limit" => 20,
            "page" => $page
        ));

        return $paginator;
    }

    public function setImageRalation($lotId, $images){
        $images = json_decode(base64_decode($images));
        
        $whereIn = '';
        foreach ($images as $image) {
            $whereIn .= '"' .basename($image) . '",';
        }
        $whereIn = trim($whereIn, ',');
        
        $phql = 'UPDATE Images SET owner_id = '. (int)$lotId . ' WHERE new_name IN ('.$whereIn.')';
        //;
        $this->getModelsManager()->executeQuery($phql);

        //$modelsManager->executeQuery($phql);
        //die(print_r(json_decode(base64_decode($images))));
    }

    public function initialize(){
        $this->belongsTo('weathercity_id', 'Cities', 'id', array(
                                                    'alias' => 'weathercity',
                                                    'reusable' => true
                                                ));

        $this->belongsTo('city_id', 'Cities', 'id', array(
                                                    'alias' => 'city',
                                                    'reusable' => true
                                                )); 
    }

}
