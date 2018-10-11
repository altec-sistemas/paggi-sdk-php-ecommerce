<?php
/**
 * This file controls all method related to banks
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Bank_File
 * @package  Paggi
 * @author   Paggi Integracoes <email@email.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK;

use Paggi\SDK\DynamicObjectGenerator;
use Paggi\SDK\Traits\Find;

 /**
  * This file control Bank's methods
  *
  * @category Bank_Class
  * @package  Paggi
  * @author   Paggi Integracoes <ti-integracoes@paggi.com>
  * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
  * @link     http://developers.paggi.com
  */
class Bank extends DynamicObjectGenerator
{
    use Find;
}
