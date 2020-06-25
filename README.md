# Paggi PHP SDK - Ecommerce

Utilize este SDK para realizar a integração com nossa API de ecommerce.

## Instalação

```sh
composer require paggi/sdk-ecommerce
```

## Configuração de Ambiente
```php
require "vendor/autoload.php"
use Paggi\SDK;
$envConfiguration = new \Paggi\SDK\EnvironmentConfiguration();
$envConfiguration->setEnv("Staging");
$envConfiguration->setToken(getenv("TOKEN"));
$envConfiguration->setPartnerIdByToken(getenv("TOKEN"));
```

## Utilização
 
### Cartões:

```php

$target = new \Paggi\SDK\Card();

$params =
[
    "cvc" => "123",
    "year" => "2022",
    "number" => "4123200700046446",
    "month" => "09",
    "holder" => "BRUCE WAYNER",
    "document" => "16123541090"
];

$response = $target->create($params);
```

### Pedidos

```php

$target = new \Paggi\SDK\Order();

$params=
[
    "external_identifier" => "ABC123",
    "ip" => "8.8.8.8",
    "charges" => [
        "amount" => 5000,
        "installments" => 10,
            "card" => [
                "number" => "5573710095684403",
                "cvc" => "123",
                "holder" => "BRUCE WAYNE",
                "year" => "2020",
                "month" => "04",
                "document" => "16123541090"
            ]                        
        ];,
    "customer" => [
        "name" => "Bruce Wayne",
        "document" => "86219425006",
        "email" => "bruce@waynecorp.com"
    ]
];

$response = $target->create($params);
```

### Recebedores

```php

$target = new \Paggi\SDK\Recipient();

$params = [
  "name" => "BRUCE WAYNER",
  "document" => "78945612389",
  "amount" => 1020,
  "transfer_amount" => 12,
  "percentage" => 3,
  "bank_account" =>
  [
    "bank_code" => "077",
    "branch_number" => "0001",
    "branch_digit" => "5",
    "account_number" => "120003",
    "account_digit" => "4",
  ],
];

$response = $target->create($params);
```

### Bancos

```php

$target = new \Paggi\SDK\Bank();

$response = $target->find(["start"=>0, "count"=>20]);```

### Planos

```php

$target = new \Paggi\SDK\Plan();

$params =
[
    "name" => "Meu primeiro plano",
    "price" => 1990,
    "interval" => "1m",
    "trial_period" => "2d",
    "external_identifier" => "12345",
    "description"=> "Teste"
];

$response = $target->create($params);
```

### Mais informações

Para mais informação, você pode conferir nossa documentação [aqui](https://developers.paggi.com/).
