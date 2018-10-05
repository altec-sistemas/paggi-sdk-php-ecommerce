<?php
/**
 * This file holds the basic configuration for the RestClient
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category RestClient_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */

 namespace Paggi\SDK;

 use Paggi\SDK\EnvironmentConfiguration;
 use Paggi\SDK\Interfaces\IRestClient;
 use Doctrine\Common\Inflector\Inflector;

 /**
  * This class verify the RestClient
  *
  * PHP version 5.6, 7.0, 7.1, 7.2
  *
  * @category RestClient_Class
  * @package  Paggi
  * @author   Paggi Integracoes <ti-integracoes@paggi.com>
  * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
  * @link     http://developers.paggi.com
  */
class RestClient implements IRestClient
{
    private static $env;
    private static $container;
    private static $method;
    private static $endPoint;
    private static $headers;

    public function __construct()
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('ConfigDI.php');
        self::$container = $builder->build();
    }
    /**
     * Function who will get the environment configuration
     *
     * @return boolean
     */
    public function getEnvironment()
    {
        $EnvironmentConfigurator = self::$container->get('EnvironmentConfiguration');
        self::$env = $EnvironmentConfigurator->isStaging();
        if (isset(self::$env) && !is_null(self::$env) && !empty(self::$env)) {
            return self::$env ? "Stage" : "Production";
        }
        return "Não foi possível localizar o environment";
    }

    /**
     * Function who will set the HTTP method
     *
     * @param string $method Método HTTP
     *
     * @return boolean
     */
    public function setMethod($method)
    {
        $Possiveis = array(
            "GET",
            "POST",
            "PUT",
            "DELETE"
        );
        self::$method = in_array(strtoupper($method), $Possiveis)
                        ? strtoupper($method) : "";
        return self::$method;
    }

    /**
     * Function who transform the resource's name in the endpoint
     *
     * @param string $resource Name who will be transformed in the endpoint
     *
     * @return void
     */
    public function setEndPoint($resource)
    {
        $inflector = self::$container->get('Inflector');
        self::$endPoint = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $inflector->pluralize($resource)));
        return self::$endPoint;
    }

    /**
     * Function who verify if the token will expire within one month
     *
     * @param array $data Array with itens to be added to headers
     *
     * @return boolean
     */
    public function createHeaders($data)
    {
        $headers = array();
        foreach ($data as $key => $value) {
            if (array_key_exists($key, $headers)) {
                array_push($header, [$key => $value]);
            }
        }
        self::$header = $headers;
        return self::$header;
    }

    /**
     * Function who will get the endpoint
     *
     * @param array $data dictionary with data to be put in the request`s body
     *
     * @return boolean
     */
    public function createBody($data)
    {
    }

    /**
     * Function who will get the endpoint
     *
     * @param string $endpoint   Token for authentication
     * @param array  $parameters Parameters for url
     *
     * @return boolean
     */
    public function mountUrl($endpoint, $parameters = [])
    {
    }

    /**
     * Function who create a request
     *
     * @param string $initialToken Token for authentication
     *
     * @return boolean
     */
    public function createRequest($initialToken)
    {
    }
}
