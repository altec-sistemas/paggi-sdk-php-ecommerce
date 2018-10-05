<?php
/**
 * This file holds the basic configuration for the environment
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Environment_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */

 namespace Paggi\SDK;

 use Lcobucci\JWT\ValidationData;
 use Lcobucci\JWT\Parser;
 use Paggi\SDK\Interfaces\IEnvironmentConfiguration;
 use DI;

 /**
  * This class verify the environment's configuration
  *
  * PHP version 5.6, 7.0, 7.1, 7.2
  *
  * @category Environment_Class
  * @package  Paggi
  * @author   Paggi Integracoes <ti-integracoes@paggi.com>
  * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
  * @link     http://developers.paggi.com
  */
class EnvironmentConfiguration implements IEnvironmentConfiguration
{
    private static $token = null;
    private static $partnerId = null;
    private static $environment = true;
    private static $container;

    public function __construct()
    {
        $builder = new \DI\ContainerBuilder();
        $builder->useAutowiring(false);
        $builder->useAnnotations(false);
        $builder->addDefinitions('ConfigDI.php');
        self::$container = $builder->build();
    }

    /**
     * Function who will set the token
     *
     * @param string $token Token
     *
     * @return boolean
     */
    public function setToken($token)
    {
        $tokenValidator = self::$container->get('TokenValidation');
        if ($tokenValidator->isValidToken($token)) {
            self::$token = $token;
            return true;
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
            self::$environment = $environmentStatus;

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
                (new Parser())->parse((string) self::$token) :
                (new Parser())->parse((string) $token);
        if (!$tokenObj->hasClaim('permissions')) {
            return false;
        }
        $partnerId = $tokenObj->getClaim('permissions')[0]->partner_id;
        if (isset($partnerId) && !is_null($partnerId) && !empty($partnerId)) {
            self::$partnerId = $partnerId;
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
            self::$partnerId = $partnerId;
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
        return self::$token;
    }

    /**
     * Function who verify what environment is configured
     *
     * @return boolean
     */
    public function isStaging()
    {
        return self::$environment;
    }

    /**
     * Function who gets the Partner's id
     *
     * @return boolean
     */
    public function getPartnerId()
    {
        return self::$partnerId;
    }
}
