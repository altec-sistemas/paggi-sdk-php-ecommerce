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
use Lcobucci\JWT\ValidationData;
use Paggi\Interfaces;
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
    static public $initialToken = "eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJQQUdHSSIsImV4"
        . "cCI6NjIwMTY3Nzc0NjYsImlhdCI6MTUzNjc3NzQ2NiwiaXNzIjoiUEFHR0kiLCJqdG"
         . "kiOiI2YjlmNDRiYy1hMGMwLTQ1ZDMtOTdmNC1kNmFlYmRiZjUwZGMiLCJuYmY"
          . "iOjE1MzY3Nzc0NjUsInBlcm1pc3Npb25zIjpbeyJwYXJ0bmVyX2lkIjoiZjlmMjZiM"
           . "2YtYWU0Ni00YzY5LTg5M2MtNTJiMTU3ZTkxMDkwIiwicGVybWlzc2lvbnMiOl"
            . "sic3lzdGVtX3VzZXIiXX1dLCJzdWIiOiJkYzcxNDFkZC1hYjQzLTQ1NmMtOWM3Mi05"
             . "MDNkOGFkYTAwZWUiLCJ0eXAiOiJhY2Nlc3MifQ.G6roX-MkbB7ofCkSOK5H8Z"
              . "vnk5XIvDXp9gvr25gPbY0MF5-8E0wgutMsaows2cQcksUg8TgJqlaKTya9FsV9nA";
    /**
     * Function responsible to test the validation of "IsValidToken"
     *
     * @return void
     */
    public function testIsValidToken()
    {
        $target = new \Paggi\SDK\TokenValidation();
        $this->assertTrue(
            $target->isValidToken(
                self::$initialToken
            )
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
        $this->assertFalse($target->isExpiredToken(self::$initialToken));
    }

    /**
     * Function responsible to test the validation of "isExpiringToken"
     *
     * @return void
     */
    public function testIsExpiringToken()
    {
        $target = new \Paggi\SDK\TokenValidation();
        $this->assertFalse($target->isExpiringToken(self::$initialToken));
    }
}
