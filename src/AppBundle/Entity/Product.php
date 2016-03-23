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
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text", length = 36)
     */
    protected $beacon;

    /**
     * @ORM\Column(type="string", length = 255)
     */
    protected $name;

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
     * Set beacon
     *
     * @param string $beacon
     *
     * @return Product
     */
    public function setBeacon($beacon)
    {
        $this->beacon = $beacon;

        return $this;
    }

    /**
     * Get beacon
     *
     * @return string
     */
    public function getBeacon()
    {
        return $this->beacon;
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
}
