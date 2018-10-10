<?php
/**
 * This file holds the tlogic to manage the responses
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Create_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK\Traits;

use \Paggi\SDK\RestClient;

/**
 * Trait Create - Create/Create a new resource
 *
 * @category Create_class
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 * */
trait ResponseManagement
{
    /**
     * POST METHOD
     *
     * @param $params Resource paramns
     *
     * @throws PaggiException Representation of HTTP error code
     *
     * @return mixed Object representing created entity
     */
    static public function manageResponse($responseCurl)
    {
        $reflectedClass = get_called_class();
        $contents = $responseCurl->getBody()->getContents();
        switch ($responseCurl->getStatusCode()) {
            case 200:
                # code...
                break;
            case 201:
                return new $reflectedClass(json_decode($contents));
            case 204:
                return $responseCurl;
            default:
                return new $reflectedClass(json_decode($contents));
        }
    }
}
