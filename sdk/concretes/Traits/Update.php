<?php
/**
 * This file holds the top level logic for any update methods
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
 * Trait Update - Update a given resource by ID
 *
 * @category Create_Test_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 * */
trait Update
{
    /**
     * GET METHOD
     *
     * @param $params Params who will be updated
     * @param $id     Resource's ID
     *
     * @return mixed Object representing created entity
     */
    static public function update($params, $id = "")
    {
    }
}
