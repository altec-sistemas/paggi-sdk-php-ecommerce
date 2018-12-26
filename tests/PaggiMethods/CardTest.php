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

use Paggi\SDK;
use PHPUnit\Framework\TestCase;

/**
 * This class will test the card class
 *
 * @category Card_Test_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
class CardTest extends TestCase
{
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
        $envConfiguration->setToken(getenv("TOKEN"));
        $envConfiguration->setPartnerIdByToken(getenv("TOKEN"));
        $cardParams
        = [
            "cvv" => "123",
            "year" => "2022",
            "number" => "4123200700046446",
            "month" => "09",
            "holder" => "BRUCE WAYNER",
            "document" => "16123541090",
        ];
        $card = $target->create($cardParams);
        $this->assertRegexp(
            "/\w+-*/",
            $card->id
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
        $envConfiguration->setToken(getenv("TOKEN"));
        $envConfiguration->setPartnerIdByToken(getenv("TOKEN"));
        $cardParams
        = [
            "cvv" => "123",
            "year" => "2022",
            "number" => "4123200700046446",
            "month" => "09",
            "holder" => "BRUCE WAYNER",
            "document" => "16123541090",
        ];
        $card = $target->create($cardParams);
        $response = $target->delete($card->id);
        $this->assertEquals($response->code, 204);
    }

    /**
     * Function responsible to test "deleteCard" and is expected to return 404
     *
     * @return void
     */
    public function testDeleteCardFailed()
    {
        $envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
        $target = new \Paggi\SDK\Card();
        $envConfiguration->setEnv("Staging");
        $envConfiguration->setToken(getenv("TOKEN"));
        $envConfiguration->setPartnerIdByToken(getenv("TOKEN"));
        $cardId = "22ae0069-0b68-0000-9d8b-b855c796312d";
        $response = $target->delete($cardId);
        $this->assertEquals($response->code, 404);
    }
}
