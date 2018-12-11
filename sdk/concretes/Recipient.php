<?php

/**
 * This file controls all method related to recipients
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Recipient_File
 * @package  Paggi
 * @author   Paggi Integracoes <email@email.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK;

use Paggi\SDK\DynamicObjectGenerator;
use Paggi\SDK\Traits\Create;
use Paggi\SDK\Traits\Find;
use Paggi\SDK\Traits\Update;

/**
 * This file control recipients's methods
 *
 * @category Recipients_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
class Recipient extends DynamicObjectGenerator
{
    use Find, Create, Update;
}
