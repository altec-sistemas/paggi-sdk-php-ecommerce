<?php

/**
 * This file will test the Recipient
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Recipient_Test_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\Tests;

use Paggi\SDK;
use PHPUnit\Framework\TestCase;

/**
 * This class will test the Recipient validation
 *
 * @category Recipient_Test_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
class RecipientTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Function responsible for testing the the method who get
     * the list of recipients
     *
     * @return void
     */
    public function testGetListRecipients()
    {
        $envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
        $recipientsFinder = new \Paggi\SDK\Recipient();
        $envConfiguration->setEnv("Staging");
        $envConfiguration->setToken(getenv("TOKEN"));
        $envConfiguration->setPartnerIdByToken(getenv("TOKEN"));

        $recipients = $recipientsFinder->find();
        $this->assertTrue(isset($recipients->total));
    }

    public function testCreateRecipient()
    {
        $envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
        $recipient = new \Paggi\SDK\Recipient();

        $envConfiguration->setEnv("Staging");
        $envConfiguration->setToken(getenv("TOKEN"));
        $envConfiguration->setPartnerIdByToken(getenv("TOKEN"));

        $recipientParams
        = [
            "name" => "BRUCE WAYNER",
            "document" => "77441122553",
            "bank_account" =>
            [
                "bank_code" => "077",
                "branch_number" => "0001",
                "branch_digit" => "5",
                "account_number" => "120003",
                "account_digit" => "4",
            ],
        ];
        $recipients = $recipient->create($recipientParams);

        $this->assertRegexp(
            "/\w+-*/",
            $recipients->id
        );
    }

    public function testUpdateRecipient()
    {
        $envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
        $recipient = new \Paggi\SDK\Recipient();

        $envConfiguration->setEnv("Staging");
        $envConfiguration->setToken(getenv("TOKEN"));
        $envConfiguration->setPartnerIdByToken(getenv("TOKEN"));

        $recipientParams
        = [
            "name" => "BRUCE WAYNER",
            "document" => "11002244558",
            "bank_account" =>
            [
                "bank_code" => "077",
                "branch_number" => "0001",
                "branch_digit" => "5",
                "account_number" => "120003",
                "account_digit" => "4",
            ],
        ];
        $recipientResponse = $recipient->create($recipientParams);

        $updateParams
        = [
            "name" => "jose",
            "bank_account" =>
            [
                "bank_code" => "077",
                "branch_number" => "0001",
                "branch_digit" => "5",
                "account_number" => "120003",
                "account_digit" => "4",
            ],
        ];
        $alterRecipient = $recipient->update($updateParams, $recipientResponse->id);
        $this->assertTrue($recipientResponse->name != $alterRecipient->name);
    }
}
