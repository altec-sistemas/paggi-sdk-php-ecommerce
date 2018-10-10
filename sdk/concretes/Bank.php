<?php
namespace Paggi\SDK;

use Paggi\SDK\DynamicObjectGenerator;
use Paggi\SDK\Traits\Find;

class Bank extends DynamicObjectGenerator
{
    use Find;

    private static $container;
    public function __construct()
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('ConfigDI.php');
        self::$container = $builder->build();
    }
}
