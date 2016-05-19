<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 25/03/16
 * Time: 7:00
 */
// src/AppBundle/Entity/Product.php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="WarehouseProductHistoryRepository")
 * @ORM\Table(name="WarehouseProductHistory")
 */
class WarehouseProductHistory
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="Warehouse")
     * @ORM\JoinColumn(name="warehouse_id", referencedColumnName="id")
     */
    protected $warehouse;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $time;

    /**
     * @ORM\Column(type="integer")
     */
    protected $strength;

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
     * Set time
     *
     * @param \DateTime $time
     *
     * @return WarehouseProductHistory
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set strength
     *
     * @param integer $strength
     *
     * @return WarehouseProductHistory
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength
     *
     * @return integer
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set warehouse
     *
     * @param \AppBundle\Entity\Warehouse $warehouse
     *
     * @return WarehouseProductHistory
     */
    public function setWarehouse(\AppBundle\Entity\Warehouse $warehouse = null)
    {
        $this->warehouse = $warehouse;

        return $this;
    }

    /**
     * Get warehouse
     *
     * @return \AppBundle\Entity\Warehouse
     */
    public function getWarehouse()
    {
        return $this->warehouse;
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return WarehouseProductHistory
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}
