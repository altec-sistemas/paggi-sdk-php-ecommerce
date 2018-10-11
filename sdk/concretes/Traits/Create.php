<?php
/**
 * This file holds the top level logic for any create methods
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Create_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK\Traits;

use \Paggi\SDK\RestClient;

/**
 * Trait Create - Create/Create a new resource
 *
 * @category Create_Trait
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 * */
trait Create
{
    /**
     * POST METHOD
     *
     * @param $params Parameters used to create any object
     *
     * @return mixed Object representing created entity
     */
    static public function create($params)
    {
        $class = new \ReflectionClass(self::class);
        $response = self::makeRequest($class, "Post", $params);
        return self::manageResponse($response);
    }
}
