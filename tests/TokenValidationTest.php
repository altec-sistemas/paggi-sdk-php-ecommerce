<?php
/**
 * This file will test the SDK
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Test_Token_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\Tests;

use PHPUnit\Framework\TestCase;
use Paggi\SDK;

/**
 * This class will test the token validation
 *
 * @category Test_Token_Class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
class TokenValidationTest extends TestCase
{
    /**
     * Function responsible to test the validation of "IsValidToken"
     *
     * @return void
     */
    public function testIsValidToken()
    {
        $target = new \Paggi\SDK\TokenValidation();
        $this->assertTrue(
            $target->isValidToken(self::getToken())
        );
    }

    /**
     * Function responsible to test the validation of "isExpiredToken"
     *
     * @return void
     */
    public function testIsExpiredToken()
    {
        $target = new \Paggi\SDK\TokenValidation();
        $this->assertFalse($target->isExpiredToken(self::getToken()));
    }

    /**
     * Function responsible to test the validation of "isExpiringToken"
     *
     * @return void
     */
    public function testIsExpiringToken()
    {
        $target = new \Paggi\SDK\TokenValidation();
        $this->assertFalse($target->isExpiringToken(self::getToken()));
    }

    /**
     * Function who will return the token.
     *
     * @return void
     */
    private static function getToken()
    {
        return getenv('TOKEN');
    }
}
