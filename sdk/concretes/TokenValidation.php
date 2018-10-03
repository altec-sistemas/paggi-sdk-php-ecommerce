<?php
/** 
 * This file verify if the token is valid
 *
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Test_File
 * @package  Paggi
 * @author   Paggi Integracoes <email@email.com>
 * @license  MIT www.www.www
 * @link     http://url.com
 */ 

 namespace Paggi\SDK;
 use Paggi\SDK\Interfaces;
 use Lcobucci\JWT\ValidationData;
 use Lcobucci\JWT\Parser;

 /** 
  * This file verify if the token is valid
  *
  * PHP version 5.4, 5.5, 5.6, 7.0, 7.1, 7.2
  *
  * @category Test_File
  * @package  Paggi
  * @author   Paggi Integracoes <email@email.com>
  * @license  MIT www.www.www
  * @link     http://url.com
  */ 
class TokenValidation
{
    static private $_initialToken 
        = "eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJhdWQiOiJQQUdHSSIsImV4"
        . "cCI6NjIwMTY3Nzc0NjYsImlhdCI6MTUzNjc3NzQ2NiwiaXNzIjoiUEFHR0kiLCJqdG"
         . "kiOiI2YjlmNDRiYy1hMGMwLTQ1ZDMtOTdmNC1kNmFlYmRiZjUwZGMiLCJuYmY"
          . "iOjE1MzY3Nzc0NjUsInBlcm1pc3Npb25zIjpbeyJwYXJ0bmVyX2lkIjoiZjlmMjZiM"
           . "2YtYWU0Ni00YzY5LTg5M2MtNTJiMTU3ZTkxMDkwIiwicGVybWlzc2lvbnMiOl"
            . "sic3lzdGVtX3VzZXIiXX1dLCJzdWIiOiJkYzcxNDFkZC1hYjQzLTQ1NmMtOWM3Mi05"
             . "MDNkOGFkYTAwZWUiLCJ0eXAiOiJhY2Nlc3MifQ.G6roX-MkbB7ofCkSOK5H8Z"
              . "vnk5XIvDXp9gvr25gPbY0MF5-8E0wgutMsaows2cQcksUg8TgJqlaKTya9FsV9nA";
    /**
     * Function responsible for the token's validation
     * 
     * @return boolean
     */
    public function isValidToken()
    {
        $token = (new Parser())->parse((string) self::$_initialToken);
        if (!$token->hasClaim('permissions')) {
            return false;
        }
        $partnerId = $token->getClaim('permissions')[0]->partner_id;
        return isset($partnerId) ? true : false;
    }

    /**
     * Function responsible for the token's expiration
     * 
     * @return boolean
     */
    public function isExpiredToken()
    {
        $time = self::expirateHelper();
        return (time() > $time) ? true : false;
    }

    /**
     * Function who verify if token's expiration date is within a month from today
     * 
     * @return boolean
     */
    public function isExpiringToken()
    {
        $time = self::expirateHelper();
        return (time() > $time - 2592000) ? true : false;
    }
    
    /**
     * Function who will help the other function to not repeat code
     * 
     * @return void
     */
    public static function expirateHelper()
    {
        $token = (new Parser())->parse((string) self::$_initialToken);
        return $token->getClaim('exp');
    }
}