<?php
/**
 * This file generates objects dynamically based in response array
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category DynamicObjectGenerator_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */

namespace Paggi\SDK;

use Paggi\SDK\Traits\ResponseManagement;

/**
 * This method get the response values and set it in to the parameters class
 *
 * @param array $response The response from request to the Paggi API
 */
abstract class DynamicObjectGenerator
{
    use ResponseManagement;

    /**
     * In this case, $this is the class that called this one.
     *
     * @param $response Array with the response's array.
     * */
    public function __construct(array $response)
    {
        foreach ($response as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
