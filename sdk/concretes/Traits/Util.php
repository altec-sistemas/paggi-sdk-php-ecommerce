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

use \Paggi\SDK\RestClient;

/**
 * Class Util - Reduce code in other classes
 *
 * @category Util_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 * */
trait Util
{
    private static $container;

    public static function makeRequest($class, $method, $params = [], $id = "", $capture = "")
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('ConfigDI.php');
        self::$container = $builder->build();

        $envConfigure = self::$container->get('EnvironmentConfiguration');
        $token = $envConfigure->getToken();
        $partnerId = $envConfigure->getPartnerId();
        $env = $envConfigure->getEnv();

        //request itself
        $restClient = self::$container->get('RestClient');
        $method = $restClient->setMethod($method);
        $endPoint = $restClient->GetEndPoint($class->getShortName());
        $headers = $restClient->CreateHeaders(
            [
                "Authorization" => "Bearer " . $token
            ]
        );
        $body = $restClient->createBody($params);
        $url = $restClient->mountURL($endPoint, $env, $partnerId, $id, $params, $capture);
        $response = $restClient->createRequest(
            $method,
            $url,
            $headers,
            $body
        );
        return $response;
    }
}
