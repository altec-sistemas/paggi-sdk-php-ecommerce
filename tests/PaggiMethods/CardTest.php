<?php
/**
 * This file will test the SDK
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Card_Test_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\Tests;

use PHPUnit\Framework\TestCase;
use Paggi\SDK;

/**
 * This class will test the card class
 *
 * @category RestClient_Test_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
class CardTest extends \PHPUnit_Framework_TestCase
{
    private static $token = "eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJQQUdHSSIsImV4cCI6NjIwMTkxMjQ2NTIsImlhdCI6MTUzOTEyNDY1MiwiaXNzIjoiUEFHR0kiLCJqdGkiOiI0MDNhMmE2ZS05NTcyLTQ2NWUtYWVlOC01MzkyZDA1MmMzNmQiLCJuYmYiOjE1MzkxMjQ2NTEsInBlcm1pc3Npb25zIjpbeyJwYXJ0bmVyX2lkIjoiMmE0YmFkNGQtNjkxNS00ODE3LTgyMWItZGUyOTA5MzdhM2M4IiwicGVybWlzc2lvbnMiOlsic3lzdGVtX3VzZXIiXX1dLCJzdWIiOiI5YzAxZGM3Mi1lMjg1LTRhMGUtOTZjOS02MGE5OGI2NzJjM2YiLCJ0eXAiOiJhY2Nlc3MifQ.AwCnCL8saJ3pBAiYpeVashWbbkAAhsPfn2TpMJZSnFEW902VwnOjRRcA9DfTwGWBMGZwfB0pMY-S42iOX1oGGA";
    /**
     * Function responsible to test "createCard"
     *
     * @return void
     */
    public function testCreateCard()
    {
        $envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
        $target = new \Paggi\SDK\Card();
        $envConfiguration->setEnv("Staging");
        $envConfiguration->setToken(self::$token);
        $envConfiguration->setPartnerIdByToken(self::$token);
        //$envConfiguration->setToken(getenv("ENVTOKEN"));
        //$envConfiguration->setPartnerIdByToken(getenv("ENVTOKEN"));
        $card =
        [
            "cvv" => "123",
            "year" => "2022",
            "number" => "4123200700046446",
            "month" => "09",
            "holder" => "BRUCE WAYNER",
            "document" => "16123541090"
        ];
        $response = $target->create($card);
        $responseId = json_decode($response->getBody()->getContents(), true)['id'];
        $this->assertRegexp(
            "/\w+-*/",
            $responseId
        );
    }

    /**
     * Function responsible to test "deleteCard" and is expected to return 204
     *
     * @return void
     */
    public function testDeleteCardOk()
    {
        $envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
        $target = new \Paggi\SDK\Card();
        $envConfiguration->setEnv("Staging");
        $envConfiguration->setToken(self::$token);
        $envConfiguration->setPartnerIdByToken(self::$token);
        $cardComponents =
        [
            "cvv" => "123",
            "year" => "2022",
            "number" => "4123200700046446",
            "month" => "09",
            "holder" => "BRUCE WAYNER",
            "document" => "16123541090"
        ];
        $card = $target->create($cardComponents);
        $cardId = json_decode($card->getBody()->getContents(), true)['id'];
        $response = $target->delete($cardId);
        $this->assertEquals($response->getStatusCode(), 204);
    }

    /**
     * Function responsible to test "deleteCard" and is expected to return 404
     *
     * @return void
     */
    public function testDeleteCardFailed()
    {
        $target = new \Paggi\SDK\Card();
        $cardId = "22ae0069-0b68-44db-9d8b-b855c796312d";
        $response = $target->delete($card);
        $this->assertEquals($response->getStatusCode(), 404);
    }
}
