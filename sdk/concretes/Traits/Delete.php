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
     * @param $id Resource paramns
     *
     * @return boolean Result of the deletion
     */
    public static function delete($id)
    {
        $class = new \ReflectionClass(self::class);

        return self::makeRequest($class, "Delete", [], $id);
    }
}
