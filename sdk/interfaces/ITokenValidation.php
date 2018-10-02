<?php
/** 
 * This file hold the Interface to control of authentication token
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
 * This class holds functions for token validation
 * 
 * @category Test_Class
 * @package  Paggi
 * @author   Paggi Integracoes <email@email.com>
 * @license  MIT www.www.www
 * @link     http://url.com
 */ 
interface ITokenValidation
{
    /**
     * Function who will validate the token
     *
     * @param [type] $initialToken Token for authentication
     * 
     * @return boolean
     */
    public function isValidToken($initialToken);

    /**
     * Function who will verify if the token is expired
     *
     * @param [type] $initialToken Token for authentication
     * 
     * @return boolean
     */
    public function isExpiredToken($initialToken);

    /**
     * Function who verify if the token will expire within one month
     *
     * @param [type] $initialToken Token for authentication
     * 
     * @return boolean
     */
    public function isExpiringToken($initialToken);
}