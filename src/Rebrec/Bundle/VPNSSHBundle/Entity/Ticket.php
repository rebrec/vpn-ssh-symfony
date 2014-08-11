<?php

namespace Rebrec\Bundle\VPNSSHBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Util\SecureRandom;
/**
 * Ticket
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ticket
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
     * @ORM\ManyToOne(targetEntity="Customer")
     */
    private $customer;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="TunnelProfile")
     */
    private $profile;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="begin_valid_date", type="datetime")
     */
    private $beginValidDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_valid_date", type="datetime")
     */
    private $endValidDate;

    /**
     * @var Integer
     *
     * @ORM\Column(name="allowed_hours", type="integer")
     */
    private $allowedHours;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="first_logon", type="datetime", nullable=true)
     */
    private $firstLogon;

    /**
     * @var string
     *
     * @ORM\Column(name="client_ip", type="string", length=16, nullable=true)
     */
    private $clientIp;

    /**
     * @var string
     *
     * @ORM\Column(name="ssh_host_ip", type="string", length=16)
     */
    private $sshHostIp;

    /**
     * @var integer
     *
     * @ORM\Column(name="ssh_host_port", type="integer")
     */
    private $sshHostPort;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=30, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="auth_key", type="string", length=30, unique=true)
     */
    private $auth_key;

    /**
     * @var string
     *
     * @ORM\Column(name="public_key", type="string", length=257)
     */
    private $publicKey;

    /**
     * @var string
     * 
     * @ORM\Column(name="private_key", type="string", length=257)
     */
    private $privateKey;

    /**
     * @var string
     *
     * @ORM\Column(name="ppk_key", type="string", length=257)
     */
    private $ppkKey;



        public function __construct()
    {
        $generator = new SecureRandom();
        $this->setAuthKey(bin2hex($generator->nextBytes(10)));
        $this->setUsername('usr-' . $this->getAuthKey());
        $this->setSshHostIp('192.168.103.210');
        $this->setSshHostPort(22);
        $start = new \DateTime();
        $end = new \DateTime('+2days');
        
        $this->setBeginValidDate($start);
        $this->setEndValidDate($end);
        $this->allowedHours = 1; // default allowed time (hours)
        $this->setPublicKey("generated");
        $this->setPrivateKey("generated");
        $this->setPpkKey('generated');
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
     * Set description
     *
     * @param string $description
     * @return Ticket
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set beginValidDate
     *
     * @param \DateTime $beginValidDate
     * @return Ticket
     */
    public function setBeginValidDate($beginValidDate)
    {
        $this->beginValidDate = $beginValidDate;

        return $this;
    }

    /**
     * Get beginValidDate
     *
     * @return \DateTime 
     */
    public function getBeginValidDate()
    {
        return $this->beginValidDate;
    }

    /**
     * Set endValidDate
     *
     * @param \DateTime $endValidDate
     * @return Ticket
     */
    public function setEndValidDate($endValidDate)
    {
        $this->endValidDate = $endValidDate;

        return $this;
    }

    /**
     * Get endValidDate
     *
     * @return \DateTime 
     */
    public function getEndValidDate()
    {
        return $this->endValidDate;
    }

    /**
     * Set allowedHours
     *
     * @param integer $allowedHours
     * @return Ticket
     */
    public function setAllowedHours($allowedHours)
    {
        $this->allowedHours = $allowedHours;

        return $this;
    }

    /**
     * Get allowedHours
     *
     * @return integer 
     */
    public function getAllowedHours()
    {
        return $this->allowedHours;
    }

    /**
     * Set firstLogon
     *
     * @param \DateTime $firstLogon
     * @return Ticket
     */
    public function setFirstLogon($firstLogon)
    {
        $this->firstLogon = $firstLogon;

        return $this;
    }

    /**
     * Get firstLogon
     *
     * @return \DateTime 
     */
    public function getFirstLogon()
    {
        return $this->firstLogon;
    }

    /**
     * Set clientIp
     *
     * @param string $clientIp
     * @return Ticket
     */
    public function setClientIp($clientIp)
    {
        $this->clientIp = $clientIp;

        return $this;
    }

    /**
     * Get clientIp
     *
     * @return string 
     */
    public function getClientIp()
    {
        return $this->clientIp;
    }

    /**
     * Set sshHostIp
     *
     * @param string $sshHostIp
     * @return Ticket
     */
    public function setSshHostIp($sshHostIp)
    {
        $this->sshHostIp = $sshHostIp;

        return $this;
    }

    /**
     * Get sshHostIp
     *
     * @return string 
     */
    public function getSshHostIp()
    {
        return $this->sshHostIp;
    }

    /**
     * Set sshHostPort
     *
     * @param integer $sshHostPort
     * @return Ticket
     */
    public function setSshHostPort($sshHostPort)
    {
        $this->sshHostPort = $sshHostPort;

        return $this;
    }

    /**
     * Get sshHostPort
     *
     * @return integer 
     */
    public function getSshHostPort()
    {
        return $this->sshHostPort;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Ticket
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set auth_key
     *
     * @param string $authKey
     * @return Ticket
     */
    public function setAuthKey($authKey)
    {
        $this->auth_key = $authKey;

        return $this;
    }

    /**
     * Get auth_key
     *
     * @return string 
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Set publicKey
     *
     * @param string $publicKey
     * @return Ticket
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;

        return $this;
    }

    /**
     * Get publicKey
     *
     * @return string 
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * Set privateKey
     *
     * @param string $privateKey
     * @return Ticket
     */
    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;

        return $this;
    }

    /**
     * Get privateKey
     *
     * @return string 
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * Set ppkKey
     *
     * @param string $ppkKey
     * @return Ticket
     */
    public function setPpkKey($ppkKey)
    {
        $this->ppkKey = $ppkKey;

        return $this;
    }

    /**
     * Get ppkKey
     *
     * @return string 
     */
    public function getPpkKey()
    {
        return $this->ppkKey;
    }

    /**
     * Set customer
     *
     * @param \Rebrec\Bundle\VPNSSHBundle\Entity\Customer $customer
     * @return Ticket
     */
    public function setCustomer(\Rebrec\Bundle\VPNSSHBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Rebrec\Bundle\VPNSSHBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set profile
     *
     * @param \Rebrec\Bundle\VPNSSHBundle\Entity\TunnelProfile $profile
     * @return Ticket
     */
    public function setProfile(\Rebrec\Bundle\VPNSSHBundle\Entity\TunnelProfile $profile = null)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return \Rebrec\Bundle\VPNSSHBundle\Entity\TunnelProfile 
     */
    public function getProfile()
    {
        return $this->profile;
    }
}
