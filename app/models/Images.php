<?php

class Images extends \Phalcon\Mvc\Model
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
    protected $real_name;

    /**
     *
     * @var string
     */
    protected $mime;

    /**
     *
     * @var string
     */
    protected $new_name;

    /**
     *
     * @var string
     */
    protected $path;

    /**
     *
     * @var string
     */
    protected $meta;

    /**
     *
     * @var string
     */
    protected $creating_time;

    /**
     *
     * @var string
     */
    protected $resource_type;

    /**
     *
     * @var integer
     */
    protected $owner_id;

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
     * Method to set the value of field real_name
     *
     * @param string $real_name
     * @return $this
     */
    public function setRealName($real_name)
    {
        $this->real_name = $real_name;

        return $this;
    }

    /**
     * Method to set the value of field mime
     *
     * @param string $mime
     * @return $this
     */
    public function setMime($mime)
    {
        $this->mime = $mime;

        return $this;
    }

    /**
     * Method to set the value of field new_name
     *
     * @param string $new_name
     * @return $this
     */
    public function setNewName($new_name)
    {
        $this->new_name = $new_name;

        return $this;
    }

    /**
     * Method to set the value of field path
     *
     * @param string $path
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Method to set the value of field meta
     *
     * @param string $meta
     * @return $this
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * Method to set the value of field creating_time
     *
     * @param string $creating_time
     * @return $this
     */
    public function setCreatingTime($creating_time)
    {
        $this->creating_time = $creating_time;

        return $this;
    }

    /**
     * Method to set the value of field resource_type
     *
     * @param string $resource_type
     * @return $this
     */
    public function setResourceType($resource_type)
    {
        $this->resource_type = $resource_type;

        return $this;
    }

    /**
     * Method to set the value of field owner_id
     *
     * @param integer $owner_id
     * @return $this
     */
    public function setOwnerId($owner_id)
    {
        $this->owner_id = $owner_id;

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
     * Returns the value of field real_name
     *
     * @return string
     */
    public function getRealName()
    {
        return $this->real_name;
    }

    /**
     * Returns the value of field mime
     *
     * @return string
     */
    public function getMime()
    {
        return $this->mime;
    }

    /**
     * Returns the value of field new_name
     *
     * @return string
     */
    public function getNewName()
    {
        return $this->new_name;
    }

    /**
     * Returns the value of field path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Returns the value of field meta
     *
     * @return string
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * Returns the value of field creating_time
     *
     * @return string
     */
    public function getCreatingTime()
    {
        return $this->creating_time;
    }

    /**
     * Returns the value of field resource_type
     *
     * @return string
     */
    public function getResourceType()
    {
        return $this->resource_type;
    }

    /**
     * Returns the value of field owner_id
     *
     * @return integer
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }
    public function setExt($ext)
    {
        $this->ext = $ext;

        return $this;
    }
    public function getExt()
    {
        return $this->ext;
    }
    
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'real_name' => 'real_name', 
            'mime' => 'mime', 
            'new_name' => 'new_name', 
            'path' => 'path', 
            'meta' => 'meta', 
            'creating_time' => 'creating_time', 
            'resource_type' => 'resource_type', 
            'owner_id' => 'owner_id'
        );
    }

}
