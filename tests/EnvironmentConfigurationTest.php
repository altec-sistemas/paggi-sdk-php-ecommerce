<?php
/**
 * This file will test the Environment
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Environment_Test_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\Tests;

use Paggi\SDK;
use PHPUnit\Framework\TestCase;

/**
 * This class will test the Environment validation
 *
 * @category Environment_Test_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
class EnvironmentConfigurationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Function responsible to test "setToken" to return true
     *
     * @return void
     */
    public function testSetTokenTrue()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertTrue(
            $target->setToken(getenv('TOKEN')),
            "Token Invalido"
        );
    }

    /**
     * Function responsible to test "setToken" to return false
     *
     * @return void
     */
    public function testSetTokenFalse()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertFalse($target->setToken(getenv('INVALIDTOKEN')));
    }

    /**
     * Function responsible to test "setEnv" to return true
     *
     * @return void
     */
    public function testSetStaging()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertEquals($target->setEnv("Staging"), "Staging");
    }

    /**
     * Function responsible to test "setEnv" to return false
     *
     * @return void
     */
    public function testSetStagingProd()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertEquals($target->setEnv("prod"), "Prod");
    }

    /**
     * Function responsible to test "testSetPartnerIdByToken" to return true
     *
     * @return void
     */
    public function testSetPartnerIdByTokenTrue()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertTrue($target->setPartnerIdByToken(getenv('TOKEN')));
    }

    /**
     * Function responsible to test "testSetPartnerIdByToken" to return true
     *
     * @return void
     */
    public function testSetPartnerIdByTokenFalse()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertFalse($target->setPartnerIdByToken(getenv('INVALIDTOKEN')));
    }

    /**
     * Function responsible to test "setPartnerId"
     *
     * @return void
     */
    public function testSetPartnerIdByPartnerId()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertTrue($target->setPartnerIdByPartnerId(getenv('PARTNERID')));
    }

    /**
     * Function responsible to test "getToken"
     *
     * @return void
     */
    public function testGetToken()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $target->setToken(getenv('TOKEN'));
        $this->assertInternalType('string', $target->getToken());
    }

    /**
     * Function responsible to test "getEnv"
     *
     * @return void
     */
    public function testGetStaging()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $target->setEnv("Staging");
        $possible = array(
            "Staging",
            "Prod",
            "O tipo de ambiente só pode ser Staging ou Prod",
        );
        $this->assertTrue(in_array($target->getEnv(), $possible));
    }
}
