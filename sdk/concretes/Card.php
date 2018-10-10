<?php
namespace Paggi\SDK;

use Paggi\SDK\DynamicObjectGenerator;
use Paggi\SDK\Traits\Create;
use Paggi\SDK\Traits\Delete;

class Card extends DynamicObjectGenerator
{
    use Create, Delete;
}
