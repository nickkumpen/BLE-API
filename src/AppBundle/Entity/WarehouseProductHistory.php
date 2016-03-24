<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 24/03/16
 * Time: 2:10
 */
// src/AppBundle/Entity/WarehouseProductHistory.php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="WarehouseProductHistory")
 */

class WarehouseProductStrength
{
    /**
     * @ORM\ManyToOne(targetEntity="Warehouse")
     * @ORM\JoinColumn(name='warehouse_id", referencedColumnName="id")
     * @ORM\Id
     */
    protected $warehouse;
    
    /**
     * @ORM\ManyToOne(tagetEntity="Product")
     * @ORM\JoinColumn(name='product_id", referencedColumnName="id")
     * @ORM\Id
     */
    protected $product;
    
    /**
     * @ORM\Column(type="datetime")
     * @ORM\Id
     */
    protected $time;

    /**
     * @ORM\Column(type="integer")
     */
    protected $strength;
    
    


}
