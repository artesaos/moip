# Package para a API v2 do MoIP
----------------------
### Package para a API v1 do MoIP (Laravel 4)

Para utilizar o package com Laravel 4 [clique aqui](https://github.com/SOSTheBlack/moip), este package está integrado somente com a API V1 do MoIP

> Estado Atual do Package

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/artesaos/moip/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/artesaos/moip/?branch=master)
[![Code Climate](https://codeclimate.com/github/artesaos/moip/badges/gpa.svg)](https://codeclimate.com/github/artesaos/moip)
[![Build Status](https://scrutinizer-ci.com/g/artesaos/moip/badges/build.png?b=master)](https://scrutinizer-ci.com/g/artesaos/moip/build-status/master)
[![Codacy Badge](https://www.codacy.com/project/badge/61b5d36f2e544ffea6fa79ae316cc9d6)](https://www.codacy.com/app/jeancesargarcia/moip)

> Estatísticas

[![Total Downloads](https://poser.pugx.org/artesaos/moip/downloads)](https://packagist.org/packages/artesaos/moip)
[![Monthly Downloads](https://poser.pugx.org/artesaos/moip/d/monthly)](https://packagist.org/packages/artesaos/moip)
[![Daily Downloads](https://poser.pugx.org/artesaos/moip/d/daily)](https://packagist.org/packages/artesaos/moip)

> Versionamento

[![Latest Stable Version](https://poser.pugx.org/artesaos/moip/v/stable)](https://packagist.org/packages/artesaos/moip)
[![Latest Unstable Version](https://poser.pugx.org/artesaos/moip/v/unstable)](https://packagist.org/packages/artesaos/moip)


> Dicas

<a href="http://zenhub.io" target="_blank"><img src="https://raw.githubusercontent.com/ZenHubIO/support/master/zenhub-badge.png" height="18px" alt="Powered by ZenHub"/></a>

> Licença

[![License](https://poser.pugx.org/artesaos/moip/license)](https://packagist.org/packages/artesaos/moip)


## Instalação

#### Composer

Comece adicionando o package no require do seu composer.json

```shell
"artesaos/moip": "^1.0"
```

Tendo as dependências carregadas e instaladas em seu projeto, vamos adicionar o ServiceProvider e o facade.

#### ServiceProvider
Você precisa atualizar sua configuração do aplicativo, a fim de registrar o pacote para que ele possa ser carregado pelo Framework

####Laravel
Basta atualizar o seu arquivo `config/app.php` adicionando o seguinte código no final do seu `serviceproviders`:
```php
'providers' => array(
    Illuminate\Foundation\Providers\ArtisanServiceProvider::class,
    Illuminate\Auth\AuthServiceProvider::class,
    ...
    Artesaos\Moip\Providers\MoipServiceProvider::class,
    ...
),
```


#### Lumen
No arquivo `/bootstrap/app.php` Adicione está linha:

```php
// file START ommited
	$app->register(Artesaos\Moip\Providers\MoipServiceProvider::class);
// file END ommited
```

#### Facade
Adicionando um novo item no seu facade

```php
'aliases' => array(
	'App'     => Illuminate\Support\Facades\App::class,
	'Artisan' => Illuminate\Support\Facades\Artisan::class,
	...
	'Moip'    => Artesaos\Moip\Facades\Moip::class,
),
```

#### Configurações
Para mover o arquivo de configurações do moip para a pasta de configurações da sua applicação, basta realizar o seguinte comando:

```shell
php artisan vendor:publish
```
ou

```shell
php artisan vendor:publish --provider="Artesaos\Moip\Providers\MoipServiceProvider"
```

Se você já publicou os arquivos, mas por algum motivo precisa sobrescrevê-los, adicione a flag '--force' no final do comando anterior.

```shell
php artisan vendor:publish --provider="Artesaos\Moip\Providers\MoipServiceProvider" --force
```

No Seu arquivo `.env`, adicione os seguintes valores

```
MOIP_KEY=yourkeyfortheservice
MOIP_TOKEN=yourtokefortheservice
MOIP_HOMOLOGATED=keyshomologatedtrueorfalse
```

## Usando

```php
$moip = Moip::start();
```

#### Criando um comprador
Nesse exemplo será criado um pedido com dados do cliente - Com endereço de entrega e de pagamento.
```php
try {
    $customer = $moip->customers()->setOwnId(uniqid())
        ->setFullname('Fulano de Tal')
        ->setEmail('fulano@email.com')
        ->setBirthDate('1988-12-30')
        ->setTaxDocument('22222222222')
        ->setPhone(11, 66778899)
        ->addAddress('BILLING',
            'Rua de teste', 123,
            'Bairro', 'Sao Paulo', 'SP',
            '01234567', 8)
        ->addAddress('SHIPPING',
                  'Rua de teste do SHIPPING', 123,
                  'Bairro do SHIPPING', 'Sao Paulo', 'SP',
                  '01234567', 8)
        ->create();
    dd($customer);
} catch (Exception $e) {
    dd($e->__toString());
}
```
#### Criando um pedido com o comprador que acabamos de criar
Nesse exemplo com vários produtos e ainda especificando valor de frete, valor adicional e ainda valor de desconto.

```php
try {
    $order = $moip->orders()->setOwnId(uniqid())
        ->addItem("bicicleta 1",1, "sku1", 10000)
        ->addItem("bicicleta 2",1, "sku2", 11000)
        ->addItem("bicicleta 3",1, "sku3", 12000)
        ->addItem("bicicleta 4",1, "sku4", 13000)
        ->addItem("bicicleta 5",1, "sku5", 14000)
        ->addItem("bicicleta 6",1, "sku6", 15000)
        ->addItem("bicicleta 7",1, "sku7", 16000)
        ->addItem("bicicleta 8",1, "sku8", 17000)
        ->addItem("bicicleta 9",1, "sku9", 18000)
        ->addItem("bicicleta 10",1, "sku10", 19000)
        ->setShippingAmount(3000)->setAddition(1000)->setDiscount(5000)
        ->setCustomer($customer)
        ->create();

    dd($order);
} catch (Exception $e) {
    dd($e->__toString());
}
```

#### Criando o pagamento
Após criar o pedido basta criar um pagamento nesse pedido.
Nesse exemplo estamos pagando com Cartão de Crédito.

```php
try {
    $payment = $order->payments()->setCreditCard(12, 21, '4073020000000002', '123', $customer)
        ->execute();

    dd($payment);
} catch (Exception $e) {
    dd($e->__toString());
}
```

## Documentação

[Documentação oficial](https://moip.com.br/referencia-api/)

## Licença

[The MIT License](https://github.com/artesaos/moip/blob/master/LICENSE)
