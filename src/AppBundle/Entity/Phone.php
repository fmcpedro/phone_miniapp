<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Phone
 */
class Phone
{
    /**
     * @var string
     */
    private $model;

    /**
     * @var float
     */
    private $height;

    /**
     * @var boolean
     */
    private $isSmart;

    /**
     * @var string
     */
    private $obs;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Brand
     */
    private $brand;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $operator;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operator = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Phone
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set height
     *
     * @param float $height
     *
     * @return Phone
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set isSmart
     *
     * @param boolean $isSmart
     *
     * @return Phone
     */
    public function setIsSmart($isSmart)
    {
        $this->isSmart = $isSmart;

        return $this;
    }

    /**
     * Get isSmart
     *
     * @return boolean
     */
    public function getIsSmart()
    {
        return $this->isSmart;
    }

    /**
     * Set obs
     *
     * @param string $obs
     *
     * @return Phone
     */
    public function setObs($obs)
    {
        $this->obs = $obs;

        return $this;
    }

    /**
     * Get obs
     *
     * @return string
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Phone
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Phone
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set brand
     *
     * @param \AppBundle\Entity\Brand $brand
     *
     * @return Phone
     */
    public function setBrand(\AppBundle\Entity\Brand $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \AppBundle\Entity\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Add operator
     *
     * @param \AppBundle\Entity\Operator $operator
     *
     * @return Phone
     */
    public function addOperator(\AppBundle\Entity\Operator $operator)
    {
        $this->operator[] = $operator;

        return $this;
    }

    /**
     * Remove operator
     *
     * @param \AppBundle\Entity\Operator $operator
     */
    public function removeOperator(\AppBundle\Entity\Operator $operator)
    {
        $this->operator->removeElement($operator);
    }

    /**
     * Get operator
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOperator()
    {
        return $this->operator;
    }
    
    public function __toString() {
        return $this->getModel();
        
    }    
}
