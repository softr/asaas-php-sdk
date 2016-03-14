Asaas.com PHP-SDK
=================

SDK não-oficial de integração á API do serviço www.asaas.com

Instalação
----------

A biblioteca pode ser instalada usando o gerenciador de dependência composer. Para instalar a biblioteca e todas suas dependências execute:

```bash
composer require softr/asaas-php-sdk:1.0
```

Para consumir o webservice é preciso usar um cliente REST que será responsável pela comunicação ao WebService. Por padrão a biblioteca inclui 'Adapters' prontos para usar os pacotes Buzz, Guzzle e GuzzleHttp. Instale **um** dos seguintes pacotes:
```bash
composer require kriswallsmith/buzz
composer require guzzle/guzzle
composer require guzzlehttp/guzzle
```
Ou adicione **um** dos seguintes pacotes no seu `composer.json`:

```json
{
    "require": {
        "kriswallsmith/buzz": "dev-master",
        "guzzle/guzzle": "^3.9@dev",
        "guzzlehttp/guzzle": "^6.1"
    }
}
```

Adapters
--------

Você pode usar os seguintes `adapters` para usar na sua aplicação: `BuzzAdapter`, `GuzzleAdapter` e `GuzzleHttpAdapter`;

Exemplo
-------

```php
<?php

require 'vendor/autoload.php';

use Softr\Asaas\Adapter\BuzzAdapter;
use Softr\Asaas\Adapter\GuzzleAdapter;
use Softr\Asaas\Adapter\GuzzleHttpAdapter;
use Softr\Asaas\Asaas;

// Instancie o adapter usando o token de acesso
$adapter = new BuzzAdapter('seu_token_de_acesso');
ou
$adapter = new GuzzleAdapter('seu_token_de_acesso');
ou
$adapter = new GuzzleHttpAdapter('seu_token_de_acesso');

// Instancie o cliente Asaas usando a instância do adapter previamente criada.
$asaas = new Asaas($adapter);
```

Endpoint
--------

Caso queira usar a API em modo teste basta especificar o `ambiente` no momento em que o cliente é instanciado.

```php
// Obs.: Caso não seja informado o segundo parâmetro a API entra em modo de produção
$asaas = new Asaas($adapter, 'producao|homologacao');
```


Clientes
--------

```php
// Retorna a listagem de clientes
$clientes = $asaas->customer()->getAll(array $filtros);

// Retorna os dados do cliente de acordo com o Id
$cobranca = $asaas->customer()->getById(123);

// Retorna os dados do cliente de acordo com o Email
$clientes = $asaas->customer()->getByEmail('email@mail.com');

// Insere um novo cliente
$cobranca = $asaas->customer()->create(array $dadosCliente);

// Atualiza os dados do cliente
$cobranca = $asaas->customer()->update(123, array $dadosCliente);

// Deleta uma cliente
$asaas->customer()->delete(123);
```


Cobranças
------------

```php
// Retorna a listagem de cobranças
$cobrancas = $asaas->payment()->getAll(array $filtros);

// Retorna os dados da cobrança de acordo com o Id
$cobranca = $asaas->payment()->getById(123);

// Retorna a listagem de cobranças de acordo com o Id do Cliente
$cobrancas = $asaas->payment()->getByCustomer($customer_id);

// Retorna a listagem de cobranças de acordo com o Id da Assinaturas
$cobrancas = $asaas->payment()->getBySubscription($subscription_id);

// Insere uma nova cobrança
$cobranca = $asaas->payment()->create(array $dadosCobranca);

// Atualiza os dados da cobrança
$cobranca = $asaas->payment()->update(123, array $dadosCobranca);

// Deleta uma cobrança
$asaas->payment()->delete(123);
```


Assinaturas
------------

```php
// Retorna a listagem de assinaturas
$assinaturas = $asaas->subscription()->getAll(array $filtros);

// Retorna os dados da assinatura de acordo com o Id
$assinatura = $asaas->subscription()->getById(123);

// Retorna a listagem de assinaturas de acordo com o Id do Cliente
$assinaturas = $asaas->subscription()->getByCustomer($customer_id);

// Insere uma nova assinatura
$assinatura = $asaas->subscription()->create(array $dadosAssinatura);

// Atualiza os dados da assinatura
$assinatura = $asaas->subscription()->update(123, array $dadosAssinatura);

// Deleta uma assinatura
$asaas->subscription()->delete(123);
```


Notificações
------------

```php
// Retorna a listagem de notificações
$notificacoes = $asaas->notification()->getAll(array $filtros);

// Retorna os dados da notificação de acordo com o Id
$notificacao = $asaas->notification()->getById(123);

// Retorna a listagem de notificações de acordo com o Id do Cliente
$notificacoes = $asaas->notification()->getByCustomer($customer_id);

// Insere uma nova notificação
$notificacao = $asaas->notification()->create(array $dadosNotificacao);

// Atualiza os dados da notificação
$notificacao = $asaas->notification()->update(123, array $dadosNotificacao);

// Deleta uma notificação
$asaas->notification()->delete(123);
```


Cidades
------

```php
// Retorna a listagem de cidades
$cidades = $asaas->city()->getAll(array $filtros);

// Retorna os dados da cidade de acordo com o Id
$action123 = $asaas->city()->getById(123);
```

Documentação Oficial
--------------------

Obs.: Esta é uma API não oficial. Foi feita com base na documentação disponibilizada [neste link](https://docs.google.com/document/d/1XUJRHY_0nd45CzFK5EmjDK92qgaQJGMxT0rjZriTk-g).


Creditos
--------

* [Agência Softr Ltda - www.softr.com.br](http://www.softr.com.br)
* Esta biblioteca foi feita com base na API DigitalOcean disponível [neste link](https://github.com/softr/DigitalOceanV2)


Suporte
-------

[Para reportar um novo bug por favor abra um novo Issue no github](https://github.com/softr/asaas-php-sdk/issues)


Licença
-------

Distribuido sobre a licença MIT. Copie, cole, modifique, melhore e compartilhe sem medo ;)
