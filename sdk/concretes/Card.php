<?php
/**
 * This file controls all method related to cards
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Card_File
 * @package  Paggi
 * @author   Paggi Integracoes <email@email.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK;

use Paggi\SDK\DynamicObjectGenerator;
use Paggi\SDK\Traits\Create;
use Paggi\SDK\Traits\Delete;

 /**
  * This file control Card's methods
  *
  * @category Card_Class
  * @package  Paggi
  * @author   Paggi Integracoes <ti-integracoes@paggi.com>
  * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
  * @link     http://developers.paggi.com
  */
class Card extends DynamicObjectGenerator
{
    use Create, Delete;
}
