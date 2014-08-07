<?php

namespace Rebrec\Bundle\TicketingBundle\Entity;

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
     * @ORM\Column(name="description", type="string", length=100)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="profile", type="string", length=20)
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
     * @var \DateTime
     *
     * @ORM\Column(name="allowed_time", type="datetime")
     */
    private $allowedTime;

    /**
     * @var string
     *
     * @ORM\Column(name="client_ip", type="string", length=16)
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
     * @ORM\Column(name="username", type="string", length=30)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="auth_key", type="string", length=30)
     */
    private $auth_key;

    /**
     * @var string
     *
     * @ORM\Column(name="public_key", type="string", length=1000)
     */
    private $publicKey;

    /**
     * @var string
     * 
     * @ORM\Column(name="private_key", type="string", length=1000)
     */
    private $privateKey;

    /**
     * @var string
     *
     * @ORM\Column(name="ppk_key", type="string", length=1000)
     */
    private $ppkKey;

    public function __construct()
    {
        $generator = new SecureRandom();
        $this->setAuthKey(bin2hex($generator->nextBytes(10)));
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
     * Set profile
     *
     * @param string $profile
     * @return Ticket
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return string 
     */
    public function getProfile()
    {
        return $this->profile;
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
     * Set allowedTime
     *
     * @param \DateTime $allowedTime
     * @return Ticket
     */
    public function setAllowedTime($allowedTime)
    {
        $this->allowedTime = $allowedTime;

        return $this;
    }

    /**
     * Get allowedTime
     *
     * @return \DateTime 
     */
    public function getAllowedTime()
    {
        return $this->allowedTime;
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
     * @param string $auth_key
     * @return Ticket
     */
    public function setAuthKey($auth_key)
    {
        $this->auth_key = $auth_key;

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
}
