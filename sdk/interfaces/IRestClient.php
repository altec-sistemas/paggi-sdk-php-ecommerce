<?php
/**
 * This file hold the Interface to control the RestClient
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category IRestClient_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK\Interfaces;

/**
 * This class holds functions for RestClient
 *
 * @category IRestClient_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
interface IRestClient
{
    /**
     * Function who will get the environment configuration
     *
     * @return boolean
     */
    public function getEnvironment();

    /**
     * Function who will set the HTTP method
     *
     * @param string $method Método HTTP
     *
     * @return boolean
     */
    public function setMethod($method);

    /**
     * Function who transform the resource's name in the endpoint
     *
     * @param string $resource Name who will be transformed in the endpoint
     *
     * @return void
     */
    public function setEndPoint($resource);

    /**
     * Function who verify if the token will expire within one month
     *
     * @param [type] $data Token for authentication
     *
     * @return boolean
     */
    public function createHeaders($data);

    /**
     * Function who will get the endpoint
     *
     * @param array $data dictionary with data to be put in the request`s body
     *
     * @return boolean
     */
    public function createBody($data);

    /**
     * Function who will get the endpoint
     *
     * @param string $endpoint   Token for authentication
     * @param array  $parameters Parameters for url
     *
     * @return boolean
     */
    public function mountUrl($endpoint, $parameters = []);

    /**
     * Function who create a request
     *
     * @param string $initialToken Token for authentication
     *
     * @return boolean
     */
    public function createRequest($initialToken);
}
