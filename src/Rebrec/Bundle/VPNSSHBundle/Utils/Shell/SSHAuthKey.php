<?php
namespace Rebrec\Bundle\VPNSSHBundle\Utils\Shell;

use Doctrine\Common\Collections\ArrayCollection;

use Rebrec\Bundle\VPNSSHBundle\Utils\Config\Configuration;
use Rebrec\Bundle\VPNSSHBundle\Entity\TunnelProfile;

class SSHAuthKey
{
    private $strPubKey = null;
    private $strRestrictions = null;
    private $tunnels = null;

    public function __construct($strPubKey, $tunnels)
    {
        $this->strPubKey = $strPubKey;
        $this->tunnels = $tunnels;
        $this->strRestrictions = Configuration::AUTHORIZEDKEYS_RESTRICTIONS;
    }
    private function getPermitOpenRule()
    {
        $res ="";
    	if (empty($this->tunnels)) {  // if arrtunnels is empty generate no-port-forwarding rule
            echo "\n\nNO PORT FORWARDING !\n";
            $res = ",no-port-forwarding";
    	} else { // loop through each tunnel to generate permitopen="ip:port" data
            foreach ($this->tunnels as $tunnel) {
                $res = $res . ',permitopen="' . $tunnel->getHostIp() . ":" . $tunnel->getHostPort() . '"';
            }
        }
        return $res;
    }
    
    public function AddToFile($strUser, $strFilePath)
    {
        $strTemporaryFile = Configuration::PROJECT_ROOT . Configuration::TEMPORARY_ROOT_DIRECTORY . $strUser . "-authkey";
        file_put_contents($strTemporaryFile, $this->GetAuthKeyString());
        $cmd = 'sudo mv ' . $strTemporaryFile . " ". $strFilePath;
        echo "Running Command : " . $cmd;
        $res = passthru($cmd);
        //chmod($strFilePath, Configuration::AUTHORIZEDKEYS_OCTAL_MASK);
        $cmd = 'sudo chmod ' . Configuration::AUTHORIZEDKEYS_MASK . " " . $strFilePath;
        echo "Running Command : " . $cmd;
        $res = passthru($cmd); 
        $cmd = 'sudo chown ' .  $strUser . ".users " . $strFilePath;
        echo "Running Command : " . $cmd;
        $res = passthru($cmd);
    }
    public function GetAuthKeyString()
    {
    	$returnValue = $this->strRestrictions . $this->getPermitOpenRule() . " " . $this->strPubKey;
        return $returnValue;
    }
 
}