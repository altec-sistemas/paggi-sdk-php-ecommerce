<?php
namespace Paggi\SDK;

use Paggi\SDK\DynamicObjectGenerator;
use Paggi\SDK\Traits\Find;
use Paggi\SDK\Traits\Create;
use Paggi\SDK\Traits\Update;

class BankAccount extends DynamicObjectGenerator
{
    use Find, Create, Update;

    private static $container;
    public function __construct()
    {
        $builder = new \DI\ContainerBuilder();
        $builder->addDefinitions('ConfigDI.php');
        self::$container = $builder->build();
    }
}
