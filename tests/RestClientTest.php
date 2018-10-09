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
use Paggi\SDK\EnvironmentConfiguration;

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
        $this->assertEquals($target->getEndpoint("card"), "cards");
    }

    /**
     * Function responsible to test "createBody" to return an array with 'data'
     *
     * @return void
     */
    public function testCreateBody()
    {
        $target = new RestClient();
        $body = $target->createBody(["body"=>"aaa"]);
        $this->assertArrayHasKey("body", $body);
    }

    /**
     * Function responsible to test "getEndpoint" to return a string with
     * same pattern
     *
     * @return void
     */
    public function testMountUrl()
    {
        $partner = new EnvironmentConfiguration();
        $partner->setPartnerIdByPartnerId(getenv('PARTNERID'));
        $target = new RestClient();
        $this->assertRegexp(
            '/.*\.paggi\.com\/v1\/partners\/.*/',
            $target->MountUrl(
                "cards",
                "Staging"
            )
        );
    }

    /**
     * Function responsible to test "createRequest" to return true
     *
     * @return void
     */
    public function testCreateRequest()
    {
        $target = new RestClient();
        $client = $target->createRequest(
            "GET",
            "https://api.stg.paggi.com/v1/banks",
            [
                "headers" => ["Content-Type" => "application/json"]
            ]
        );
        $this->assertEquals($client->getStatusCode(), 200);
    }

    public function testIntegrationPost()
    {
        $envConf = new EnvironmentConfiguration();
        $envConf->setPartnerIdByPartnerId(getenv("PARTNERID"));
        $target = new RestClient();
        $env = $target->getEnvironment();
        $method = $target->setMethod("post");
        $endPoint = $target->getEndPoint("card");
        $headers = $target->createHeaders(
            [
                "Authorization" => "bearer " . getenv("ENVTOKEN")
            ]
        );
        $body = $target->createBody(
            [
                "cvv" => "123",
                "year" => "2022",
                "number" => "4123200700046446",
                "month" => "09",
                "holder" => "BRUCE WAYNER",
                "document" => "16123541090"
            ]
        );
        $url = $target->mountUrl(
            $endPoint,
            $env
        );
        $response = $target->createRequest(
            $method,
            $url,
            $headers,
            $body
        );
        $this->assertEquals($response->getStatusCode(), 201);
    }

    public function testIntegrationGet()
    {
        $target = new RestClient();
        $env = $target->getEnvironment();
        $method = $target->setMethod("Get");
        $endPoint = $target->getEndPoint("bank");
        $headers = $target->createHeaders(
            [
                "headers" => ["Content-Type" => "application/json"]
            ]
        );
        $body = $target->createBody();
        $url = $target->mountUrl(
            $endPoint,
            $env,
            [
                "start"=>0,
                "count"=>5
            ]
        );
        $response = $target->createRequest(
            $method,
            "https://api.stg.paggi.com/v1/banks",
            $headers,
            $body
        );
        $this->assertEquals($response->getStatusCode(), 200);
    }
}
