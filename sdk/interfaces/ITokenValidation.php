<?php
/**
 * This file hold the Interface to control of authentication token
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Interface_Token_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK\Interfaces;

/**
 * This class holds functions for token validation
 *
 * @category Interface_Token_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
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
