<?php
/**
 * This file will test the SDK
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Bank_Test_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\Tests;

use PHPUnit\Framework\TestCase;
use Paggi\SDK;

/**
 * This class will test the Bank class
 *
 * @category RestClient_Test_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
class BankTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Function responsible to test "deleteBank" and is expected to return 404
     *
     * @return void
     */
    public function testGetBank()
    {
        $envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
        $bankFinder = new \Paggi\SDK\Bank();

        $envConfiguration->setEnv("Staging");
        $envConfiguration->setToken(getenv("ENVTOKEN"));
        $envConfiguration->setPartnerIdByToken(getenv("ENVTOKEN"));

        $banks = $bankFinder->find(["start"=>0, "count"=>20]);
        $this->assertTrue($banks->count == 20);
    }
}
