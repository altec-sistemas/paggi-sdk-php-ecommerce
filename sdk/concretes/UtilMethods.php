<?php

/**
 * This file controls all method related to plans
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Plans_File
 * @package  Paggi
 * @author   Paggi Integracoes <email@email.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK;

/**
 * This file control plans's methods
 *
 * @category Plans_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
class UtilMethods
{
    public function generateRandomString($length = 11)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
