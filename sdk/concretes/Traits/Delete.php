<?php
/**
 * This file holds the top level logic for any post methods
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
 * Trait Delete - Delete/Delete a new resource
 *
 * @category Create_Test_class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 * */
trait Delete
{
    /**
     * DELETE METHOD
     *
     * @param $params Resource paramns
     *
     * @return boolean Result of the deletion
     */
    public static function delete()
    {
        $class = new \ReflectionClass(self::class);
        $util = self::$container->get("Util");
        if ($this->id === null) {
            return "Error";
        }
        $response = $util->makeRequest($class, "Delete", [], $this->$id);
        return "Error";
    }
}
