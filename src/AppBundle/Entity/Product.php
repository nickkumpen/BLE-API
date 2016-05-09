<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 23/03/16
 * Time: 8:16
 */
// src/AppBundle/Entity/Product.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Product")
 */
class Product
{
    /**
     * @ORM\Column(type="string", length = 36, options = {"fixed" = TRUE})
     * @ORM\Id
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length = 255)
     */
    protected $name;
    
    /**
     * @ORM\ManyToMany(targetEntity="Warehouse", inversedBy="products")
     * @ORM\JoinTable(name="warehouse_products")
     */
    protected $warehouses;
    
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->warehouses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Product
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
     * Add warehouse
     *
     * @param \AppBundle\Entity\Warehouse $warehouse
     *
     * @return Product
     */
    public function addWarehouse(\AppBundle\Entity\Warehouse $warehouse)
    {
        $this->warehouses[] = $warehouse;

        return $this;
    }

    /**
     * Remove warehouse
     *
     * @param \AppBundle\Entity\Warehouse $warehouse
     */
    public function removeWarehouse(\AppBundle\Entity\Warehouse $warehouse)
    {
        $this->warehouses->removeElement($warehouse);
    }

    /**
     * Get warehouses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWarehouses()
    {
        return $this->warehouses;
    }

    /**
     * Set id
     *
     * @param string $id
     *
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
