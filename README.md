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
$envConfiguration->setEnv("Staging"); // Staging or Production
$envConfiguration->setToken(getenv("TOKEN"));
$envConfiguration->setPartnerIdByToken(getenv("TOKEN"));
```

## Utilização
 
### Cartões:

```php

$target = new \Paggi\SDK\Card();

> Criar cartão:

$params = [
    "cvc" => "123",
    "year" => "2022",
    "number" => "4123200700046446",
    "month" => "09",
    "holder" => "BRUCE WAYNER",
    "document" => "12312312312"
];

$response = $target->create($params);


> Consultar cartão por cliente: 

$params = [
    "document" => "12312312312"
];  

$response = $target->find($params);


> Desativar cartão: 

$inactive_params = [
    "card_id" => "a2e60adb-581d-4ac0-b46e-d848ab3ab891"
];

$response = $target->delete($get_params);

```

### Pedidos

```php

$target = new \Paggi\SDK\Order();

> Criar Pagamento

$params =
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


> Cancelar Pagamento

$params = [
    "order_id" => "2cc931bc-cbe0-4fd8-aa34-0c2693d5123c"
]

$response = $target->cancel($params);
```

### Recebedores

O campo `account_type` pode ser:

- CONTA_CORRENTE
- CONTA_POUPANCA
- CONTA_FACIL
- ENTIDADE_PUBLICA

```php

$target = new \Paggi\SDK\Recipient();

> Criar Recebedor:

$params = [
  "name" => "BRUCE WAYNER",
  "document" => "78945612389",
  "amount" => 1020,
  "transfer_amount" => 12,
  "percentage" => 3,
  "bank_account" => [
    "bank_code" => "077",
    "branch_number" => "0001",
    "branch_digit" => "5",
    "account_number" => "120003",
    "account_digit" => "4",
    "account_holder_name" => "BRUCE WAYNE"
    "account_type" => "CONTA_CORRENTE"
  ],
];

$response = $target->create($params);

> Buscar recebedor:

$reponse = $target->find();

> Atualizar Recebedor:

$params = [
    "recipient_id" => "01ae7814-a124-44a0-b892-e0e428b91f1e",
    "transfer_amount" => 10,
    "percentage" => 4
];

$response = $target->update($params);

```

### Bancos

```php

$target = new \Paggi\SDK\Bank();

$response = $target->find(["start"=>0, "count"=>20]);
```

### Planos

```php

$target = new \Paggi\SDK\Plan();

> Criar Plano:

$params = [
    "name" => "Meu primeiro plano",
    "price" => 1990,
    "interval" => "1m",
    "trial_period" => "2d",
    "external_identifier" => "12345",
    "description"=> "Teste"
];

$response = $target->create($params);

> Consultar plano:

$params = [
    "plan_id" => "7f42a0a0-6ae8-4a57-a340-a8c4867771eb"
]

$response = $target->find($params);

> Atualizar plano:

$params = [
    "plan_id" => "7f42a0a0-6ae8-4a57-a340-a8c4867771eb",
    "price" => 2990,
    "interval" => "3m"
]

$response = $target->update($params);


> Cancelar plano: 

$params = [
    "plan_id" => "7f42a0a0-6ae8-4a57-a340-a8c4867771eb"
]

$response = $target->delete($params);
```

### Mais informações

Para mais informação, você pode conferir nossa documentação [aqui](https://developers.paggi.com/).
