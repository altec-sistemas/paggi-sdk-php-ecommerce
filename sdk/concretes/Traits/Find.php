<?php
/**
 * This file holds the top level logic for any find methods
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Find_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK\Traits;

/**
 * Trait Find - Find all of a given resource or find by ID
 *
 * @category Find_Trait
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 * */
trait Find
{
    /**
     * GET METHOD
     *
     * @param $params Resource paramns
     * @throws PaggiException Representation of HTTP error code
     * @return mixed Object representing created entity
     */
    public static function find($params = [], $id = "")
    {
        $class = new \ReflectionClass(self::class);
        if (!empty($id)) {
            $response = self::makeRequest($class, "get", [], $params, $id);
            return self::manageResponse($response);
        }
        $response = self::makeRequest($class, "get", [], $params);
        return self::manageResponse($response);
    }
}
