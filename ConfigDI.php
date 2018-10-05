<?php
use Paggi\SDK;
use Psr\Container\ContainerInterface;

return [
    'TokenValidation' => function (ContainerInterface $c) {
        return new \Paggi\SDK\TokenValidation();
    }
];
