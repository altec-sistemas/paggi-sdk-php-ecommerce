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
     * @param $responseCurl Resource paramns
     *
     * @throws PaggiException Representation of HTTP error code
     *
     * @return mixed Object representing created entity
     */
    static public function manageResponse($responseCurl)
    {
        //Empty arrays definition
        $entries = [];
        $outsideObject = [];

        //Get the caller's class name
        $reflectedClass = get_called_class();
        $arrayClassName = explode("\\", $reflectedClass);
        $className = end($arrayClassName);

        //get the response's content
        $contents = json_decode($responseCurl->getBody()->getContents());

        //Dealing with the response possibilities
        switch ($responseCurl->getStatusCode()) {
            case 200:
                if (array_key_exists("entries", $contents)) {
                    $entriesResponse = $contents->entries;
                    $itemNumber = 0;


                    foreach ($entriesResponse as $item) {
                        $obj = new $reflectedClass($item);
                        $entries[$className . $itemNumber] = $obj;
                        $itemNumber++;
                    }
                    $objClass = new $reflectedClass($entries);


                    foreach ($contents as $key => $value) {
                        if (strcmp($key, "entries") != 0) {
                            $outsideObject[$key] = [$value];
                        }
                        if (strcmp($key, "entries") == 0) {
                            $outsideObject[$key] = [$objClass];
                        }
                    }
                    return new $reflectedClass($outsideObject);
                }
                return new $reflectedClass($contents);
                break;
            case 201:
                return new $reflectedClass(($contents));
            case 204:
            case 400:
            case 401:
            case 402:
            case 422:
            case 500:
            case 501:
            case 502:
            case 502:
                return $responseCurl;
            default:
                return new $reflectedClass($contents);
        }
    }

    static public function push($group, $entry)
    {
        array_push($group, $entry);
    }
}
