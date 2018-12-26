<?php
/**
 * This file holds the logic to manage the responses
 * PHP version 5.6, 7.0, 7.1, 7.2
 *
 * @category Create_File
 * @package  Paggi
 * @author   Paggi Integracoes <ti-integracoes@paggi.com>
 * @license  GNU GPLv3 https://www.gnu.org/licenses/gpl-3.0.en.html
 * @link     http://developers.paggi.com
 */
namespace Paggi\SDK\Traits;

/**
 * Trait Create - Create/Create a new resource
 *
 * @category ResponseManagement_Trait
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
     * @param $responseCurl Response from Paggi API
     *
     * @return mixed Object that differs depending of the request's status code
     */
    public static function manageResponse($responseCurl)
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
        switch ($code = $responseCurl->getStatusCode()) {
            case 200:
                //verify if response has more than one entry
                if (array_key_exists("entries", $contents)) {
                    $entriesResponse = $contents->entries;
                    $itemNumber = 0;

                    //Create the entries object
                    foreach ($entriesResponse as $item) {
                        $obj = new $reflectedClass($item);
                        $entries[$className . $itemNumber] = $obj;
                        $itemNumber++;
                    }
                    $objClass = new $reflectedClass($entries);

                    //Create the resource objects
                    foreach ($contents as $key => $value) {
                        if (strcmp($key, "entries") != 0) {
                            $outsideObject[$key] = $value;
                        }
                        if (strcmp($key, "entries") == 0) {
                            $outsideObject[$key] = $objClass;
                        }
                    }
                    return new $reflectedClass($outsideObject);
                }
                return new $reflectedClass($contents);
                break;
            case 201:
                return new $reflectedClass(($contents));
            case 422:
                $parametros = [];
                foreach ($contents as $key => $value) {
                    array_push($parametros, [$key => $value]);
                }
                return (object) [
                    "code" => $code, "mensagem" => "Foi encontrado um erro em algum parâmetro do corpo da requisição",
                    "parameters" => [$parametros],
                ];
            case 204:
                return (object) ["code" => $code, "mensagem" => "Deletado com sucesso."];
            case 400:
                return (object) ["code" => $code, "mensagem" => "Algum parâmetro ou cabeçalho HTTP está ausente."];
            case 401:
                return (object) ["code" => $code, "mensagem" => "Não autorizada."];
            case 402:
                return (object) ["code" => $code, "mensagem" => "Uma ou mais cobranças foram negadas"];
            case 404:
                return (object) ["code" => $code, "mensagem" => "Objeto não encontrado"];
            case 500:
                return (object) ["code" => $code, "mensagem" => "Erro interno no servidor."];
            case 501:
                return (object) ["code" => $code, "mensagem" => "Este método não é implementado para esse recurso."];
            case 502:
                return (object) ["code" => $code, "mensagem" => "Ocorreu um erro na infraestrutura Paggi."];
            case 503:
                return (object) ["code" => $code, "mensagem" => "Ocorreu um erro na infraestrutura Paggi."];
            default:
                return new $reflectedClass($contents);
        }
    }

    /**
     * Function responsible for push the item to respective array
     *
     * @param array $group
     * @param array $entry
     *
     * @return void
     */
    public static function push($group, $entry)
    {
        array_push($group, $entry);
    }
}
