<?php
/** 
 * This file will test the SDK
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Test_File
 * @package  Paggi
 * @author   Paggi Integracoes <email@email.com>
 * @license  MIT www.www.www
 * @link     http://url.com
 */ 
namespace Paggi\Tests;
use PHPUnit\Framework\TestCase;
use Paggi\SDK;

/**
 * This class will test the token validation
 * 
 * @category Test_Class
 * @package  Paggi
 * @author   Paggi Integracoes <email@email.com>
 * @license  MIT www.www.www
 * @link     http://url.com
 */ 
class TokenValidationTest extends \PHPUnit_Framework_TestCase
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
            $target->isValidToken()
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
        $this->assertFalse($target->isExpiredToken());
    }

    /**
     * Function responsible to test the validation of "isExpiringToken"
     *
     * @return void
     */
    public function testIsExpiringToken()
    {
        $target = new \Paggi\SDK\TokenValidation();
        $this->assertFalse($target->isExpiringToken());
    }
}
