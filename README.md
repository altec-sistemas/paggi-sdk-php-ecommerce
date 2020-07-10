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

$response = $target->delete($card_id);

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

$response = $target->cancel($order_id);
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
    "name" => "BRUCE WAYNER",
    "document" => "78945612389",
    "bank_account" => [
        "bank_code" => "077",
        "branch_number" => "0123",
        "branch_digit" => "4",
        "account_number" => "330233",
        "account_digit" => "7",
        "account_holder_name" => "BRUCE WAYNE"
        "account_type" => "CONTA_CORRENTE"
  ],
];

$response = $target->update($params, $recipient_id);

```

### Bancos

```php

$target = new \Paggi\SDK\Bank();

$response = $target->find(["start"=>0, "count"=>20]);
```


### Planos / Assinaturas


Para criar uma assinatura é necessário um plano existente.
O Plano controla o valor, intervalo entre pagamentos, duração, período de teste da assinatura.
A Assinatura é responsável pelo pagamento, assim como desconto e preços adicionais se necessário.

```php

$plan = new \Paggi\SDK\Plan();
$subscription = new \Paggi\SDK\Subscription();

> Criar Plano:

$params = [
    "name" => "Meu primeiro plano",
    "price" => 1990,
    "interval" => "1m",
    "trial_period" => "2d",
    "external_identifier" => "12345",
    "description"=> "Teste"
];

$response = $plan->create($params);

> Criar Assinatura:

$params = [
    "external_identifier" => "Seu ID de assinatura",
    "plan_id" => plan["id"],
    "ip" => "8.8.8.8",
    "customer" => [
        "name" => "Bruce Wayne",
        "document" => "86219425006",
        "email" => "bruce@waynecorp.com"
   ],
    "card" => [
        "cvc" => "123",
         "year" => "2020",
        "month" => "01",
          "number" => "4485200700046446",
        "holder" => "BRUCE WAYNER",
        "document" => "16223541090"
   ],
    "discount" => [
            "period" => 2,
            "description" => "Teste de discount",
         "  amount" => 2000
   ],
    "additional" => [
            "period" => 3,
            "description" => "Teste de additional",
            "amount" => 1999
        ]
]

$response = $subscription->find($params);

> Consultar plano:

$params = [
    "plan_id" => "7f42a0a0-6ae8-4a57-a340-a8c4867771eb"
]

$response = $plan->find($params);

> Atualizar plano:

$params = [
    "price" => 2990,
    "interval" => "3m"
]

$response = $plan->update($params, $plan_id);


> Cancelar plano: 

$plan_id = "7f42a0a0-6ae8-4a57-a340-a8c4867771eb"

$response = $plan->delete($plan_id);
```

### Mais informações

Para mais informação, você pode conferir nossa documentação [aqui](https://developers.paggi.com/).
