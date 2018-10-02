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
    /**
     * Function responsible for the token's validation
     *
     * @param string $issuer       Token's issuer
     * @param string $audience     Token's audience
     * @param string $id           Token's id
     * @param string $initialToken Authentication Token
     * 
     * @return boolean
     */
    public function isValidToken($issuer, $audience, $id, $initialToken)
    {
        $token = (new Parser())->parse((string) $initialToken);
        $token->getClaims();
        return $token->hasClaim('jti') ? true : false;
    }

    /**
     * Function responsible for the token's expiration
     *
     * @param string $initialToken Authentication Token
     * 
     * @return boolean
     */
    public function isExpiredToken($initialToken)
    {
        $time = self::expirateHelper($initialToken);
        return (time() > $time) ? true : false;
    }

    /**
     * Function who verify if token's expiration date is within a month from today
     *
     * @param string $initialToken Authentication Token
     * 
     * @return boolean
     */
    public function isExpiringToken($initialToken)
    {
        $time = self::expirateHelper($initialToken);
        return (time() > $time - 2592000) ? true : false;
    }
    
    /**
     * Function who will help the other function to not repeat code
     *
     * @param string $initialToken Authentication Token
     * 
     * @return void
     */
    public static function expirateHelper($initialToken)
    {
        $token = (new Parser())->parse((string) $initialToken);
        return $token->getClaim('exp');
    }
}
