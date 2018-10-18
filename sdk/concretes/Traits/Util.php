<?php
/**
 * This file holds some methods that helps other classes
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Util_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK\Traits;

use Paggi\SDK\RestClient;
use \Paggi\SDK\EnvironmentConfiguration;

/**
 * Class Util - Reduce code in other classes
 *
 * @category Util_Trait
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 * */
trait Util
{
    private static $container;

    /**
     * Undocumented function
     *
     * @param string $class      Request's creator's class
     * @param string $method     Request's method
     * @param array  $bodyParams Parameters used to be sent in request's body
     * @param array  $urlParams  parameters used in query url
     * @param string $id         object's ID
     * @param string $options    ["void", "capture", ""]
     *
     * @return void
     */
    public static function makeRequest($class, $method, $bodyParams = [], $urlParams = [], $id = "", $options = "")
    {
        //DI configuration
        //$builder = new \DI\ContainerBuilder();
        //$builder->addDefinitions('ConfigDI.php');
        //self::$container = $builder->build();

        //Environment configuration
        $envConfigure = new EnvironmentConfiguration();
        $token = $envConfigure->getToken();
        $partnerId = $envConfigure->getPartnerId();
        $env = $envConfigure->getEnv();

        //request itself
        $restClient = new RestClient();
        $method = $restClient->setMethod($method);
        $endPoint = $restClient->GetEndPoint($class->getShortName());
        $headers = $restClient->CreateHeaders(
            [
                "Authorization" => "Bearer " . $token,
            ]
        );
        $body = $restClient->createBody($bodyParams);
        $url = $restClient->mountURL($endPoint, $env, $partnerId, $id, $urlParams, $options);
        $response = $restClient->createRequest(
            $method,
            $url,
            $headers,
            $body
        );
        return $response;
    }
}
