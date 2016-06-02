<?php
/**
 * Created by PhpStorm.
 * User: nick
 * Date: 2/06/16
 * Time: 10:01
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="Job")
 */
class Job
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length = 255)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length = 255)
     */
    protected $address;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $start;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $end;
    
    

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
     * Set jobName
     *
     * @param string $jobName
     *
     * @return Job
     */
    public function setJobName($jobName)
    {
        $this->job_name = $jobName;

        return $this;
    }

    /**
     * Get jobName
     *
     * @return string
     */
    public function getJobName()
    {
        return $this->job_name;
    }

    /**
     * Set jobAddress
     *
     * @param string $jobAddress
     *
     * @return Job
     */
    public function setJobAddress($jobAddress)
    {
        $this->job_address = $jobAddress;

        return $this;
    }

    /**
     * Get jobAddress
     *
     * @return string
     */
    public function getJobAddress()
    {
        return $this->job_address;
    }

    /**
     * Set jobStart
     *
     * @param \DateTime $jobStart
     *
     * @return Job
     */
    public function setJobStart($jobStart)
    {
        $this->job_start = $jobStart;

        return $this;
    }

    /**
     * Get jobStart
     *
     * @return \DateTime
     */
    public function getJobStart()
    {
        return $this->job_start;
    }

    /**
     * Set jobEnd
     *
     * @param \DateTime $jobEnd
     *
     * @return Job
     */
    public function setJobEnd($jobEnd)
    {
        $this->job_end = $jobEnd;

        return $this;
    }

    /**
     * Get jobEnd
     *
     * @return \DateTime
     */
    public function getJobEnd()
    {
        return $this->job_end;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Job
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
     * Set address
     *
     * @param string $address
     *
     * @return Job
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Job
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Job
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }
}
