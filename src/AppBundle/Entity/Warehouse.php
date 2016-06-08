<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 23/03/16
 * Time: 8:17
 */
// src/AppBundle/Entity/Warehouse.php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="Warehouse")
 */
class Warehouse
{
    /**
     * @ORM\Column(type="string", length=255)
     * @ORM\Id
     * 
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length = 255)
     */
    protected $name;

    /**
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="warehouses")
     */
    protected $products;

    /**
     * @ORM\ManyToOne(targetEntity="WorkOrder", inversedBy="warehouses")
     */
    protected $workorder;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Warehouse
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return Warehouse
     */
    public function addProduct(\AppBundle\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \AppBundle\Entity\Product $product
     */
    public function removeProduct(\AppBundle\Entity\Product $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set id
     *
     * @param string $id
     *
     * @return Warehouse
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set workorder
     *
     * @param \AppBundle\Entity\Order $workorder
     *
     * @return Warehouse
     */
    public function setWorkorder(\AppBundle\Entity\Order $workorder = null)
    {
        $this->workorder = $workorder;

        return $this;
    }

    /**
     * Get workorder
     *
     * @return \AppBundle\Entity\Order
     */
    public function getWorkorder()
    {
        return $this->workorder;
    }
}
