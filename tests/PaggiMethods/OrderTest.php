<?php
/**
 * This file will test the SDK
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Order_Test_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\Tests;

use Paggi\SDK;
use PHPUnit\Framework\TestCase;

/**
 * This class will test the Order class
 *
 * @category Order_Test_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
class OrderTest extends TestCase
{
    /**
     * Function responsible to test "OneOrderWithCapture"
     *
     * @return void
     */
    public function testOneOrderWithCapture()
    {
        $envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
        $orderCreator = new \Paggi\SDK\Order();
        $envConfiguration->setEnv("Staging");
        $envConfiguration->setToken(getenv("TOKEN"));
        $envConfiguration->setPartnerIdByToken(getenv("TOKEN"));

        $charge
            = [
                "amount" => 5000,
                "card" =>
                [
                    "number" => "5573710095684403",
                    "cvc" => "123",
                    "holder" => "BRUCE WAYNE",
                    "year" => "2020",
                    "month" => "04",
                    "document" => "16123541090",
                ],
            ];
        $orderParams
            = [
                "external_identifier" => "ABC123",
                "ip"=> "8.8.8.8",
                "charges" => [$charge],
                "customer" =>
                [
                    "name" => "Bruce Wayne",
                    "document" => "86219425006",
                    "email" => "bruce@waynecorp.com",
                ],
            ];
        $response = $orderCreator->create($orderParams);

        $this->assertRegExp("/captured/", $response->status);
    }

    /**
     * Function responsible to test "OneOrderWithoutCapture"
     *
     * @return void
     */
    public function testOneOrderWithoutCapture()
    {
        $envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
        $orderCreator = new \Paggi\SDK\Order();
        $cardCreator = new \Paggi\SDK\Card();

        $envConfiguration->setEnv("Staging");
        $envConfiguration->setToken(getenv("TOKEN"));
        $envConfiguration->setPartnerIdByToken(getenv("TOKEN"));
        $card = $cardCreator->create(
            [
                "cvv" => "123",
                "year" => "2022",
                "number" => "4485200700046446",
                "month" => "09",
                "holder" => "BRUCE WAYNER",
                "document" => "16123541090",
            ]
        );
        $charge
            = [
                "amount" => 5000,
                "card" => ["id" => $card->id],
            ];
        $orderParams
            = [
                "capture" => false,
                "external_identifier" => "ABC123",
                "ip"=> "8.8.8.8",
                "charges" => [$charge],
                "customer" =>
                [
                    "name" => "Bruce Wayne",
                    "document" => "86219425006",
                    "email" => "bruce@waynecorp.com",
                ],
            ];
        $response = $orderCreator->create($orderParams);
        $this->assertRegExp("/authorized/", $response->status);
    }

    /**
     * Function responsible to test "OneOrderWithoutCaptureAndCapture"
     *
     * @return void
     */
    public function testOneOrderWithoutCaptureAndCapture()
    {
        $envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
        $orderCreator = new \Paggi\SDK\Order();
        $cardCreator = new \Paggi\SDK\Card();

        $envConfiguration->setEnv("Staging");
        $envConfiguration->setToken(getenv("TOKEN"));
        $envConfiguration->setPartnerIdByToken(getenv("TOKEN"));

        $orderCreator = new \Paggi\SDK\Order();
        $envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
        $cardCreator = new \Paggi\SDK\Card();
        $card = $cardCreator->create(
            [
                "cvv" => "123",
                "year" => "2022",
                "number" => "4485200700046446",
                "month" => "09",
                "holder" => "BRUCE WAYNER",
                "document" => "16123541090",
            ]
        );
        $charge
            = [
                "amount" => 5000,
                "card" => ["id" => $card->id],
            ];
        $orderParams
            = [
                "capture" => false,
                "external_identifier" => "ABC123",
                "ip"=> "8.8.8.8",
                "charges" => [$charge],
                "customer" =>
                [
                    "name" => "Bruce Wayne",
                    "document" => "86219425006",
                    "email" => "bruce@waynecorp.com",
                ],
            ];
        $response = $orderCreator->create($orderParams);
        //$capture = $response->capture();
        $this->assertRegExp("/authorized/", $response->status);
    }

    /**
     * Function responsible to test "OneOrderWithoutCaptureAndCancel"
     *
     * @return void
     */
    public function testOneOrderWithoutCaptureAndCancel()
    {
        $envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
        $orderCreator = new \Paggi\SDK\Order();
        $cardCreator = new \Paggi\SDK\Card();

        $envConfiguration->setEnv("Staging");
        $envConfiguration->setToken(getenv("TOKEN"));
        $envConfiguration->setPartnerIdByToken(getenv("TOKEN"));

        $orderCreator = new \Paggi\SDK\Order();
        $envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
        $cardCreator = new \Paggi\SDK\Card();
        $card = $cardCreator->create(
            [
                "cvv" => "123",
                "year" => "2022",
                "number" => "4485200700046446",
                "month" => "09",
                "holder" => "BRUCE WAYNER",
                "document" => "16123541090",
            ]
        );
        $charge
            = [
                "amount" => 5000,
                "card" => ["id" => $card->id],
            ];
        $orderParams
            = [
                "capture" => false,
                "external_identifier" => "ABC123",
                "ip"=> "8.8.8.8",
                "charges" => [$charge],
                "customer" =>
                [
                    "name" => "Bruce Wayne",
                    "document" => "86219425006",
                    "email" => "bruce@waynecorp.com",
                ],
            ];
        $response = $orderCreator->create($orderParams);
        // $capture = $response->cancel($response->id);
        $this->assertRegExp("/authorized/", $response->status);
    }
}
