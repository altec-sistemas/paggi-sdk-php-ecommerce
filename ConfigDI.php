<?php
use Paggi\SDK;
use Psr\Container\ContainerInterface;

return [
    'TokenValidation' => function (ContainerInterface $c) {
        return new \Paggi\SDK\TokenValidation();
    },
    'EnvironmentConfiguration' => function (ContainerInterface $c) {
        return new \Paggi\SDK\EnvironmentConfiguration();
    },
    'Inflector' => function (ContainerInterface $c) {
        return new \Doctrine\Common\Inflector\Inflector();
    }
];
