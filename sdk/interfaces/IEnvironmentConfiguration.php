<?php
/** 
 * This file hold the Interface to control environment's configuration
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Test_File
 * @package  Paggi
 * @author   Paggi Integracoes <email@email.com>
 * @license  MIT www.www.www
 * @link     http://url.com
 */ 
namespace Paggi\SDK\Interfaces;

/**
 * This class holds functions for environment's configuration
 * 
 * @category Test_Class
 * @package  Paggi
 * @author   Paggi Integracoes <email@email.com>
 * @license  MIT www.www.www
 * @link     http://url.com
 */ 
interface IEnvironmentConfiguration
{
    /**
     * Function who will set the token
     *
     * @param string $token Token 
     * 
     * @return boolean
     */
    function setToken($token);

    /**
     * Function who will set the environment
     *
     * @param boolean $environmentStatus true if staging
     * 
     * @return boolean
     */
    function setStaging($environmentStatus);

    /**
     * Function who will set the setPartnerIdByToken
     * 
     * @param string $token token
     * 
     * @return boolean
     */
    public function setPartnerIdByToken($token);
    
    /**
     * Function who will set the setPartnerIdByPartnerId
     * 
     * @param string $partnerId partnerId
     * 
     * @return boolean
     */
    public function setPartnerIdByPartnerId($partnerId); 

    /**
     * Function who gets the token configured
     * 
     * @return boolean
     */
    function getToken();

    /**
     * Function who verify what environment is configured
     * 
     * @return boolean
     */
    function isStaging();

    /**
     * Function who gets the Partner's id
     * 
     * @return boolean
     */
    function getPartnerId();
}