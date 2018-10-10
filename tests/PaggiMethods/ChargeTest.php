<?php
/**
 * This file will test the SDK
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Charge_Test_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\Tests;

use PHPUnit\Framework\TestCase;
use Paggi\SDK;

/**
 * This class will test the Charge class
 *
 * @category RestClient_Test_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
class ChargeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Function responsible to test "deleteCharge" and is expected to return 404
     *
     * @return void
     */
    public function testCreateCharge()
    {
        $target = new \Paggi\SDK\Charge();
        $params =
        [
            "start" => 0,
            "count" => 5
        ];
        $response = $target->find($params);
        $this->assertEquals($response->getStatusCode(), 200);
    }
}
