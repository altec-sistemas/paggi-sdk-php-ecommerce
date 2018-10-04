<?php
/** 
 * This file holds the basic configuration for the environment
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Test_File
 * @package  Paggi
 * @author   Paggi Integracoes <email@email.com>
 * @license  MIT www.www.www
 * @link     http://url.com
 */ 

 namespace Paggi\SDK;
 use Lcobucci\JWT\ValidationData;
 use Lcobucci\JWT\Parser;
 use Paggi\SDK\Interfaces\IEnvironmentConfiguration;

 /** 
  * This file verify if the token is valid
  *
  * PHP version 5.6, 7.0, 7.1, 7.2
  *
  * @category Test_File
  * @package  Paggi
  * @author   Paggi Integracoes <email@email.com>
  * @license  MIT www.www.www
  * @link     http://url.com
  */ 
class EnvironmentConfiguration implements IEnvironmentConfiguration
{
    private static $_token;
    private static $_partnerId;
    private static $_environment = true;

    /**
     * Function who will set the token
     *
     * @param string $token Token 
     * 
     * @return boolean
     */
    public function setToken($token)
    {
        if (TokenValidation::isValidToken($token)) {
            self::$_token = $token;
            return true;
            self:setPartnerId();
        }
        return false;
    }

    /**
     * Function who will set the environment
     *
     * @param boolean $environmentStatus true if staging
     * 
     * @return boolean
     */
    public function setStaging($environmentStatus)
    {
        if (is_bool($environmentStatus)) {
            $_environment = $environmentStatus;
            return true;
        }
        return false;
    }

    /**
     * Function who will set the partnerId using the token
     * 
     * @param string $token token
     * 
     * @return boolean
     */
    public function setPartnerIdByToken($token) 
    {
        $tokenObj 
            = (!isset($token) || is_null($token) || empty($token)) ?
                (new Parser())->parse((string) self::$_token) :
                (new Parser())->parse((string) $token);
        if (!$tokenObj->hasClaim('permissions')) {
            return false;
        }
        $partnerId = $tokenObj->getClaim('permissions')[0]->partner_id;
        if (isset($partnerId) && !is_null($partnerId) && !empty($partnerId)) {
            self::$_partnerId = $partnerId;
            return true;
        }
        return false;
    }

    /**
     * Function who will set the partnerId
     * 
     * @param string $partnerId partnerId
     * 
     * @return boolean
     */
    public function setPartnerIdByPartnerId($partnerId) 
    {
        if (isset($partnerId) || !is_null($partnerId) || !empty($partnerId)) {
            $_partnerId = $partnerId;
            return true;
        }
        return false;
    }

    /**
     * Function who gets the token configured
     * 
     * @return boolean
     */
    public function getToken()
    {
        return self::$_token;
    }

    /**
     * Function who verify what environment is configured
     * 
     * @return boolean
     */
    public function isStaging()
    {
        return self::$_environment;
    }

    /**
     * Function who gets the Partner's id
     * 
     * @return boolean
     */
    public function getPartnerId()
    {
        return self::$_partnerId;
    }
}