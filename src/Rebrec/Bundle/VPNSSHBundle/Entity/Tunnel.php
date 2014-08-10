<?php

namespace Rebrec\Bundle\VPNSSHBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tunnel
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tunnel
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=20)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="HostIp", type="string", length=16)
     */
    private $hostIp;

    /**
     * @var integer
     *
     * @ORM\Column(name="HostPort", type="integer")
     */
    private $hostPort;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="Protocol")
     */
    private $protocol;


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
     * Set name
     *
     * @param string $name
     * @return Tunnel
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
     * Set hostIp
     *
     * @param string $hostIp
     * @return Tunnel
     */
    public function setHostIp($hostIp)
    {
        $this->hostIp = $hostIp;

        return $this;
    }

    /**
     * Get hostIp
     *
     * @return string 
     */
    public function getHostIp()
    {
        return $this->hostIp;
    }

    /**
     * Set hostPort
     *
     * @param integer $hostPort
     * @return Tunnel
     */
    public function setHostPort($hostPort)
    {
        $this->hostPort = $hostPort;

        return $this;
    }

    /**
     * Get hostPort
     *
     * @return integer 
     */
    public function getHostPort()
    {
        return $this->hostPort;
    }

    /**
     * Set protocol
     *
     * @param \Rebrec\Bundle\VPNSSHBundle\Entity\Protocol $protocol
     * @return Tunnel
     */
    public function setProtocol(\Rebrec\Bundle\VPNSSHBundle\Entity\Protocol $protocol = null)
    {
        $this->protocol = $protocol;

        return $this;
    }

    /**
     * Get protocol
     *
     * @return \Rebrec\Bundle\VPNSSHBundle\Entity\Protocol 
     */
    public function getProtocol()
    {
        return $this->protocol;
    }
    /**
     * Get protocol NAME
     *
     * @return string
     */
    public function getProtocolName()
    {
        return $this->protocol->getName();
    }
}
