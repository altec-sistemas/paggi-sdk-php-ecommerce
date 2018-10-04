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
class EnvironmentConfigurationTest extends \PHPUnit_Framework_TestCase
{
    static private $_token = "eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJQQUdHSSIsImV4"
    . "cCI6NjIwMTY3Nzc0NjYsImlhdCI6MTUzNjc3NzQ2NiwiaXNzIjoiUEFHR0kiLCJqdG"
     . "kiOiI2YjlmNDRiYy1hMGMwLTQ1ZDMtOTdmNC1kNmFlYmRiZjUwZGMiLCJuYmY"
      . "iOjE1MzY3Nzc0NjUsInBlcm1pc3Npb25zIjpbeyJwYXJ0bmVyX2lkIjoiZjlmMjZiM"
       . "2YtYWU0Ni00YzY5LTg5M2MtNTJiMTU3ZTkxMDkwIiwicGVybWlzc2lvbnMiOl"
        . "sic3lzdGVtX3VzZXIiXX1dLCJzdWIiOiJkYzcxNDFkZC1hYjQzLTQ1NmMtOWM3Mi05"
         . "MDNkOGFkYTAwZWUiLCJ0eXAiOiJhY2Nlc3MifQ.G6roX-MkbB7ofCkSOK5H8Z"
          . "vnk5XIvDXp9gvr25gPbY0MF5-8E0wgutMsaows2cQcksUg8TgJqlaKTya9FsV9nA";//getenv('ENVTOKEN');
    static private $_partnerId 
        =  "f9f26b3f-ae46-4c69-893c-52b157e91090";
    static private $_environment = true;
    
    /**
     * Function responsible to test "setToken" to return true
     *
     * @return void
     */
    public function testSetTokenTrue()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertTrue(
            $target->setToken(getenv('ENVTOKEN')),
            "Token Invalido"
        );
    }

    /**
     * Function responsible to test "setToken" to return false
     *
     * @return void
     */
    public function testSetTokenFalse()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertFalse(
            $target->setToken("..")
        );
    }

    /**
     * Function responsible to test "setStaging" to return true
     *
     * @return void
     */
    public function testSetStagingTrue()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertTrue($target->setStaging(true));
    }

    /**
     * Function responsible to test "setStaging" to return false
     *
     * @return void
     */
    public function testSetStagingFalse()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertFalse($target->setStaging("teste"));
    }


    /**
     * Function responsible to test "testSetPartnerIdByToken" to return true
     *
     * @return void
     */
    public function testSetPartnerIdByTokenTrue()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertTrue($target->setPartnerIdByToken(getenv('ENVTOKEN')));
    }

    /**
     * Function responsible to test "testSetPartnerIdByToken" to return true
     *
     * @return void
     */
    public function testSetPartnerIdByTokenFalse()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertFalse($target->setPartnerIdByToken(".."));
    }

    /**
     * Function responsible to test "setPartnerId"
     *
     * @return void
     */
    public function testSetPartnerIdByPartnerId()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        var_dump(getenv('PARTNERID'));
        $this->assertTrue($target->setPartnerIdByPartnerId(getenv('PARTNERID')));
    }

    /**
     * Function responsible to test "getToken"
     *
     * @return void
     */
    public function testGetToken()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertInternalType('string', $target->getToken());
    }

    /**
     * Function responsible to test "isStaging"
     *
     * @return void
     */
    public function testIsStaging()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertTrue($target->isStaging());
    }


    /**
     * Function responsible to test "getToken"
     *
     * @return void
     */
    public function testGetPartnerId()
    {
        $target = new \Paggi\SDK\EnvironmentConfiguration();
        $this->assertInternalType('string', $target->getPartnerId());
    }

}
