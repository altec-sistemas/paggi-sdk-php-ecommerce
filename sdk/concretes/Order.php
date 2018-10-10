<?php
namespace Paggi\SDK;

use Paggi\SDK\DynamicObjectGenerator;
use Paggi\SDK\Traits\Create;
use Paggi\SDK\Traits\Cancel;
use Paggi\SDK\Traits\Capture;

class Order extends DynamicObjectGenerator
{
    use Create;
}
