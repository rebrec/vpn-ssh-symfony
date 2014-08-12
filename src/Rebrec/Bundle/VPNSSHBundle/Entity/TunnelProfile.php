<?php

namespace Rebrec\Bundle\VPNSSHBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * TunnelProfile
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TunnelProfile
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
     * @ORM\Column(name="name", type="string", length=30)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="Tunnel")
     */
    private $tunnels;



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
     * @return TunnelProfile
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
     * Set tunnels
     *
     * @param string $tunnels
     * @return TunnelProfile
     */
    public function setTunnels($tunnels)
    {
        $this->tunnels = $tunnels;

        return $this;
    }

    /**
     * Get tunnels
     *
     * @return string 
     */
    public function getTunnels()
    {
        return $this->tunnels;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tunnels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tunnels
     *
     * @param \Rebrec\Bundle\VPNSSHBundle\Entity\Tunnel $tunnels
     * @return TunnelProfile
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
    
    public function getTunnelsToArray()
    {
        $arrTunnels = array();
        foreach ($this->tunnels as $tunnel) {
            $arrTunnels[] = array(
                'name' => $tunnel->getName(),
                'proto'=> $tunnel->getProtocol()->getName(),
                'tunnelIP' => $tunnel->getHostIp(),
                'tunnelPort' => $tunnel->getHostPort(),
            );
        }
        return $arrTunnels;
        }
    
}
