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
    'RestClient'=> function (ContainerInterface $c) {
        return new \Paggi\SDK\RestClient();
    },
    'Util'=> function (ContainerInterface $c) {
        return new \Paggi\SDK\Util();
    },
    'Inflector' => function (ContainerInterface $c) {
        return new \Doctrine\Common\Inflector\Inflector();
    },
    'HttpClient' => function (ContainerInterface $c) {
        return new \GuzzleHttp\Client();
    }
];
