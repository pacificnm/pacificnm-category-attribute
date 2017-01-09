<?php
namespace Pacificnm\CategoryAttribute\Entity;

class Entity
{

    /**
     *
     * @var number
     */
    protected $categoryAttributeId;

    /**
     *
     * @var striing
     */
    protected $categoryAttributeType;

    /**
     *
     * @var string
     */
    protected $categoryAttributeName;

    /**
     *
     * @var boolean
     */
    protected $categoryAttributeActive;

    /**
     *
     * @return the $categoryAttributeId
     */
    public function getCategoryAttributeId()
    {
        return $this->categoryAttributeId;
    }

    /**
     *
     * @return the $categoryAttributeType
     */
    public function getCategoryAttributeType()
    {
        return $this->categoryAttributeType;
    }

    /**
     *
     * @return the $categoryAttributeName
     */
    public function getCategoryAttributeName()
    {
        return $this->categoryAttributeName;
    }

    /**
     *
     * @return the $categoryAttributeActive
     */
    public function getCategoryAttributeActive()
    {
        return $this->categoryAttributeActive;
    }

    /**
     *
     * @param number $categoryAttributeId            
     */
    public function setCategoryAttributeId($categoryAttributeId)
    {
        $this->categoryAttributeId = $categoryAttributeId;
    }

    /**
     *
     * @param \Pacificnm\CategoryAttribute\Entity\striing $categoryAttributeType            
     */
    public function setCategoryAttributeType($categoryAttributeType)
    {
        $this->categoryAttributeType = $categoryAttributeType;
    }

    /**
     *
     * @param string $categoryAttributeName            
     */
    public function setCategoryAttributeName($categoryAttributeName)
    {
        $this->categoryAttributeName = $categoryAttributeName;
    }

    /**
     *
     * @param boolean $categoryAttributeActive            
     */
    public function setCategoryAttributeActive($categoryAttributeActive)
    {
        $this->categoryAttributeActive = $categoryAttributeActive;
    }
}

