<?php
/**
 * This file holds the top level logic for any get methods
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Create_Test_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK\Traits;

use \Paggi\SDK\RestClient;
use \Paggi\SDK\Util;

/**
 * Trait Find - Find all of a given resource or find by ID
 *
 * @category Create_Test_Class
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
    static public function find($params, $id = "")
    {
        $class = new \ReflectionClass(self::class);
        $util = self::$container->get("Util");
        if (!empty($id)) {
            $response = $util->makeRequest($class, "get", $params, $id);
            return $response;
        }
        if (is_set($this->id)) {
            $response = $util->makeRequest($class, "get", $params, $this->$id);
            return $response;
        }
        $response = $util->makeRequest($class, "get", $params);
        return $response;
    }
}
