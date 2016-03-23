<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 23/03/16
 * Time: 4:35
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="camionet1")
 */
class camionet1
{
    /**
     * @ORM\Column(type="text", length = 36, options={"fixed"= true})
     * @ORM\Id
     */
    protected $uuid;

    /**
     * @ORM\Column(type="integer")
     */
    protected $sterkte;

    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return mixed
     */
    public function getSterkte()
    {
        return $this->sterkte;
    }

    
    
    
    
}