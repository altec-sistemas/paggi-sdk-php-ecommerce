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

use Paggi\SDK\EnvironmentConfiguration;
use Paggi\SDK\RestClient;
use PHPUnit\Framework\TestCase;

/**
 * This class will test the token validation
 *
 * @category RestClient_Test_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
class RestClientTest extends TestCase
{

    /**
     * Function responsible for test the "getEndpoint" function
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
     * Function responsible for test the "getEndpoint" function
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
        $body = $target->createBody(["body" => "aaa"]);
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
        $env = new EnvironmentConfiguration();
        $env->setPartnerIdByPartnerId(getenv('PARTNERID'));
        $target = new RestClient();
        $this->assertRegexp(
            '/.*\.paggi\.com\/v1\/partners\/.*/',
            $target->MountUrl(
                "cards",
                "Staging",
                $env->getPartnerId(),
                "",
                [],
                ""
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
                "headers" => ["Content-Type" => "application/json"],
            ]
        );
        $this->assertEquals($client->getStatusCode(), 200);
    }

    /**
     * This function will test the client's basic workflow to create something
     *
     * @return void
     */
    public function testIntegrationPost()
    {
        $envConf = new EnvironmentConfiguration();
        $envConf->setToken(getenv("TOKEN"));
        $envConf->setPartnerIdByPartnerId(getenv("PARTNERID"));
        $token = $envConf->getToken();
        $target = new RestClient();
        $env = "Staging";
        $method = $target->setMethod("post");
        $endPoint = $target->getEndPoint("card");
        $headers = $target->createHeaders(
            [
                "Authorization" => "Bearer " . $token,
            ]
        );
        $body = $target->createBody(
            [
                "cvv" => "123",
                "year" => "2022",
                "number" => "4123200444046446",
                "month" => "09",
                "holder" => "BRUCE WAYNER",
                "document" => "16123541090",
            ]
        );
        $url = $target->mountUrl(
            $endPoint,
            $env,
            $envConf->getPartnerId()
        );
        $response = $target->createRequest(
            $method,
            $url,
            $headers,
            $body
        );
        $this->assertEquals($response->getStatusCode(), 201);
    }

    /**
     * This function will test the client's basic workflow to get something
     *
     * @return void
     */
    public function testIntegrationGet()
    {
        $envConf = new EnvironmentConfiguration();
        $envConf->setPartnerIdByPartnerId(getenv("PARTNERID"));
        $partnerId = $envConf->getPartnerId();
        $target = new RestClient();
        $env = "Staging";
        $method = $target->setMethod("Get");
        $endPoint = $target->getEndPoint("bank");
        $headers = $target->createHeaders(
            [
                "headers" => ["Content-Type" => "application/json"],
            ]
        );
        $body = $target->createBody();
        $url = $target->mountUrl(
            $endPoint,
            $env,
            $partnerId,
            "",
            [
                "start" => 0,
                "count" => 5,
            ],
            ""
        );
        $response = $target->createRequest(
            $method,
            $url, //"https://api.stg.paggi.com/v1/banks",
            $headers,
            $body
        );
        $this->assertEquals($response->getStatusCode(), 200);
    }
}
