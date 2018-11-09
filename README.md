# Paggi PHP SDK - Ecommerce

Utilize este SDK para realizar a integração com nossa API de ecommerce.

## Instalação

```sh
composer require paggi/sdk-ecommerce
```

## Utilização

### Cartões:

```php
use Paggi\SDK;
$envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
$target = new \Paggi\SDK\Card();
$envConfiguration->setEnv("Staging");
$envConfiguration->setToken(getenv("ENVTOKEN"));
$envConfiguration->setPartnerIdByToken(getenv("ENVTOKEN"));
$cardParams =
[
    "cvv" => "123",
    "year" => "2022",
    "number" => "4123200700046446",
    "month" => "09",
    "holder" => "BRUCE WAYNER",
    "document" => "16123541090"
];
$card = $target->create($cardParams);
```

### Pedidos

```php
$envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
$OrderCreator = new \Paggi\SDK\Order();
$envConfiguration->setEnv("Staging");
$envConfiguration->setToken(getenv("ENVTOKEN"));
$envConfiguration->setPartnerIdByToken(getenv("ENVTOKEN"));
$charge =
[
    "amount" => 5000,
    "installments" => 10,
    "card" =>
    [
        "number" => "5573710095684403",
        "cvc" => "123",
        "holder" => "BRUCE WAYNE",
        "year" => "2020",
        "month" => "04",
        "document" => "16123541090"
    ]
];
$orderParams=
[
    "external_identifier" => "ABC123",
    "ip" => "8.8.8.8",
    "charges" => [$charge],
    "customer" =>
    [
        "name" => "Bruce Wayne",
        "document" => "86219425006",
        "email" => "bruce@waynecorp.com"
    ]
];
$response = $OrderCreator->create($orderParams);
```

### Bancos

```php
$envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
$bankFinder = new \Paggi\SDK\Bank();
$envConfiguration->setEnv("Staging");
$envConfiguration->setToken(getenv("ENVTOKEN"));
$envConfiguration->setPartnerIdByToken(getenv("ENVTOKEN"));
$banks = $bankFinder->find(["start"=>0, "count"=>20]);
```
### Planos

```php
$envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
$planCreator = new \Paggi\SDK\Plan();
$envConfiguration->setEnv("Staging");
$envConfiguration->setToken(getenv("ENVTOKEN"));

$planParams =
[
    "name" => "Meu primeiro plano",
    "price" => 1990,
    "interval" => "1m",
    "trial_period" => "2d",
    "external_identifier" => "12345",
    "description"=> "Teste"
];

$response = $planCreator->create($planParams);
```

### Mais informações

Para mais informação, você pode conferir nossa documentação [aqui](https://developers.paggi.com/).
