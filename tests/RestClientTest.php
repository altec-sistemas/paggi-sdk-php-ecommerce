<?php
/**
 * This file will test the SDK
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category RestClient_Test_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\Tests;

use PHPUnit\Framework\TestCase;
use Paggi\SDK\RestClient;
use \GuzzleHttp\Psr7;

/**
 * This class will test the token validation
 *
 * @category RestClient_Test_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
class RestClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Function responsible to test "getEnvironment" to return true
     *
     * @return void
     */
    public function testGetEnvironment()
    {
        $target = new RestClient();
        $this->assertTrue(is_string($target->getEnvironment()));
    }

    /**
     * Function responsible for test the "getEndpoint"function
     * In this case, we will test for GET method
     *
     * @return void
     */
    public function testSetMethod()
    {
        $target = new RestClient();
        $this->assertEquals($target->setMethod("get"), "GET");
    }

    /**
     * Function responsible for test the "getEndpoint"function
     *
     * @return void
     */
    public function testSetEndpoint()
    {
        $target = new RestClient();
        $this->assertEquals($target->setEndpoint("card"), "cards");
    }

    /**
     * Function responsible to test "createHeaders" to return true
     *
     * @return void
     */
    public function testCreateHeaders()
    {
        $target = new RestClient();
        $client = $target->createHeaders();
        $this->assertEquals(
            'application/json; charset=utf-8',
            $client->getHeader('Content-Type')[0]
        );
    }

    /**
     * Function responsible to test "createBody" to return an array with 'data'
     *
     * @return void
     */
    public function testCreateBody()
    {
        $target = new RestClient();
        $body = $target->createBody();
        $this->assertArrayHasKey('data', $body);
    }

    /**
     * Function responsible to test "getEndpoint" to return a string with
     * same pattern
     *
     * @return void
     */
    public function testMountUrl()
    {
        $target = new RestClient();
        $this->assertRegex('/\.paggi\.com\/v1\/partners\//', $target->getMountUrl());
    }

    /**
     * Function responsible to test "createRequest" to return true
     *
     * @return void
     */
    public function testCreateRequest()
    {
        $target = new RestClient();
        $client = $target->createRequest();
        var_dump($client->getBody());
        $this->assertTrue($client->getBody());
    }
}
