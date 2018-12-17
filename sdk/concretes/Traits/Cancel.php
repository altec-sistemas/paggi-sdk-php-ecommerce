<?php
/**
 * This file holds the top level logic for any cancel methods
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Cancel_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK\Traits;

/**
 * Trait Cancel - Cancel all of a given resource or find by ID
 *
 * @category Create_Trait
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 * */
trait Cancel
{
    /**
     * PUT cancel METHOD
     *
     * @param $id Object's ID who will be used for cancelation (Optional)
     *
     * @return mixed Object representing created entity
     */
    public static function cancel($id)
    {
        $class = new \ReflectionClass(self::class);
        $response = self::makeRequest($class, "put", [], [], $id, "/void");
        return self::manageResponse($response);
    }
}
