<?php
/**
 * This file holds the top level logic for any capture methods
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Capture_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK\Traits;

/**
 * Trait Capture - Capture all of a given resource or find by ID
 *
 * @category Capture_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 * */
trait Capture
{
    /**
     * PUT capture METHOD
     *
     * @param $id Order ID who you want to cancel
     *
     * @return mixed Object representing created entity
     */
    public static function capture($id, $requestBody = [])
    {
        $class = new \ReflectionClass(self::class);
        $response = self::makeRequest($class, "put", $requestBody, [], $id, "/capture");
        return self::manageResponse($response);
    }
}
