<?php

namespace Rebrec\Bundle\VPNSSHBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;
/**
 * Protocol
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Protocol
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
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     *
     * @ORM\OneToMany(targetEntity="Tunnel", mappedBy="protocol")
     */
    private $tunnels;
    
    public function __construct()
    {
        $this->tunnels = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Protocol
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
     * Add tunnels
     *
     * @param \Rebrec\Bundle\VPNSSHBundle\Entity\Tunnel $tunnels
     * @return Protocol
     */
    public function addTunnel(\Rebrec\Bundle\VPNSSHBundle\Entity\Tunnel $tunnels)
    {
        $this->tunnels[] = $tunnels;

        return $this;
    }

    /**
     * Remove tunnels
     *
     * @param \Rebrec\Bundle\VPNSSHBundle\Entity\Tunnel $tunnels
     */
    public function removeTunnel(\Rebrec\Bundle\VPNSSHBundle\Entity\Tunnel $tunnels)
    {
        $this->tunnels->removeElement($tunnels);
    }

    /**
     * Get tunnels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTunnels()
    {
        return $this->tunnels;
    }
}
