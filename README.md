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
[![Slack Laravel Brasil](http://laravelbrasil.vluzrmos.com.br/badge.svg)](http://laravelbrasil.vluzrmos.com.br)

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
Adicionando um novo item no seu provider

```php
'providers' => array(
    Illuminate\Foundation\Providers\ArtisanServiceProvider::class,
    Illuminate\Auth\AuthServiceProvider::class,
    ...
    Artesaos\Moip\Providers\MoipServiceProvider::class,
    ...
),
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
php artisan vendor:publish --tag=config
```

Se você já publicou os arquivos, mas por algum motivo precisa sobrescrevê-los, adicione a flag '--force' no final do comando anterior.

```shell
php artisan vendor:publish --tag=config --force
```

No Seu arquivo `.env`, adicione os seguintes valores

```
MOIP_KEY=yourkeyfortheservice
MOIP_TOKEN=yourtokefortheservice
MOIP_HOMOLOGATED=keyshomologatedtrueorfalse
```

#### Usando

```php
try {
	$moip = Moip::start();

	$customer = $moip->customers()->setOwnId(uniqid())
	                             ->setFullname('Fulano de Tal')
	                             ->setEmail('fulano@email.com')
	                             ->setBirthDate('1988-12-30')
	                             ->setTaxDocument('22222222222')
	                             ->setPhone(11, 66778899)
	                             ->addAddress('BILLING',
	                                          'Rua de teste', 123,
	                                          'Bairro', 'Sao Paulo', 'SP',
	                                          '01234567', 8);
	$order = $moip->orders()->setOwnId(uniqid())
	                        ->addItem('Bicicleta Specialized Tarmac 26 Shimano Alivio', 1, 'uma linda bicicleta', 10000)
	                        ->setCustomer($customer)
	                        ->create();


	$payment = $order->payments()->setCreditCard(12, 15, '4073020000000002', '123', $customer)
	                             ->execute();	

	dd($payment);
} catch (Exception $e) {
	printf($e->__toString());
}
```

## Licença

[The MIT License](https://github.com/artesaos/moip/blob/master/LICENSE)
