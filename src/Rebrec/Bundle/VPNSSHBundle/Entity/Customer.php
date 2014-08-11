<?php

namespace Rebrec\Bundle\VPNSSHBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Customer
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
     * @ORM\Column(name="FirstName", type="string", length=20)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=20)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=50)
     */
    private $email;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="customers")
     */
    private $company;

    
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
     * Set firstName
     *
     * @param string $firstName
     * @return Customer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Customer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set company
     *
     * @param \Rebrec\Bundle\VPNSSHBundle\Entity\Company $company
     * @return Customer
     */
    public function setCompany(\Rebrec\Bundle\VPNSSHBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Rebrec\Bundle\VPNSSHBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }
    
    public function getFullName()
    {
        return $this->lastName . " " . $this->firstName;
        
    }
}
