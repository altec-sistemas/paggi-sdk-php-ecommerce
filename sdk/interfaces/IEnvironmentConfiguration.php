<?php
/**
 * This file hold the Interface to control environment's configuration
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Interface_Environment_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK\Interfaces;

/**
 * This class holds public functions for environment's configuration
 *
 * @category Interface_Environment_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
interface IEnvironmentConfiguration
{
    /**
     * public function who will set the token
     *
     * @param string $token Token
     *
     * @return boolean
     */
    public function setToken($token);

    /**
     * public function who will set the environment
     *
     * @param boolean $environmentStatus true if staging
     *
     * @return boolean
     */
    public function setStaging($environmentStatus);

    /**
     * public function who will set the setPartnerIdByToken
     *
     * @param string $token token
     *
     * @return boolean
     */
    public function setPartnerIdByToken($token);

    /**
     * public function who will set the setPartnerIdByPartnerId
     *
     * @param string $partnerId partnerId
     *
     * @return boolean
     */
    public function setPartnerIdByPartnerId($partnerId);

    /**
     * public function who gets the token configured
     *
     * @return boolean
     */
    public function getToken();

    /**
     * public function who verify what environment is configured
     *
     * @return boolean
     */
    public function getEnv();

    /**
     * public function who gets the Partner's id
     *
     * @return boolean
     */
    public function getPartnerId();
}
