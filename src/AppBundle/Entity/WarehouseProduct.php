<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 23/03/16
 * Time: 7:33
 */
// src/AppBundle/Entity/WarehouseProduct.php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="WarehouseProduct")
 */
class WarehouseProduct
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
