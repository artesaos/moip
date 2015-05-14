# Package para a API v2 do MoIP
----------------------

> Estado Atual do Package

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/artesaos/moip/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/artesaos/moip/?branch=master)
[![Code Climate](https://codeclimate.com/github/artesaos/moip/badges/gpa.svg)](https://codeclimate.com/github/artesaos/moip)
[![Build Status](https://scrutinizer-ci.com/g/artesaos/moip/badges/build.png?b=master)](https://scrutinizer-ci.com/g/artesaos/moip/build-status/master)
[![Project Status](http://stillmaintained.com/SOSTheBlack/moip.png)](https://stillmaintained.com/SOSTheBlack/moip)

> Estatísticas

[![Total Downloads](https://poser.pugx.org/artesaos/moip/downloads)](https://packagist.org/packages/artesaos/moip)
[![Monthly Downloads](https://poser.pugx.org/artesaos/moip/d/monthly)](https://packagist.org/packages/artesaos/moip)
[![Daily Downloads](https://poser.pugx.org/artesaos/moip/d/daily)](https://packagist.org/packages/artesaos/moip)

> Versionamento

[![Latest Stable Version](https://poser.pugx.org/artesaos/moip/v/stable)](https://packagist.org/packages/artesaos/moip)
[![Latest Unstable Version](https://poser.pugx.org/artesaos/moip/v/unstable)](https://packagist.org/packages/artesaos/moip)

> Licença

[![License](https://poser.pugx.org/artesaos/moip/license)](https://packagist.org/packages/artesaos/moip)

### Package para a API v1 do MoIP (Laravel 4)

Para utilizar a primeira versão do package que é integrada com a API v1 do Moip, cofira o [branch v1](https://github.com/SOSTheBlack/moip/tree/v1)

## Instalação

#### Composer

Comece adicionando o package no require do seu composer.json
```
composer require artesao/moip --dev
```

Tendo as dependências carregadas e instaladas em seu projeto, vamos adicionar o ServiceProvider e o facade.

#### ServiceProvider
Adicionando um novo item no seu provider
```
'providers' => array(
    'Illuminate\Foundation\Providers\ArtisanServiceProvider',
    'Illuminate\Auth\AuthServiceProvider',
    ...
    'Artesaos\Moip\Providers\MoipServiceProvider',
    ...
),
```
#### Facade
Adicionando um novo item no seu facade
```
'aliases' => array(
    'App'        => 'Illuminate\Support\Facades\App',
    'Artisan'    => 'Illuminate\Support\Facades\Artisan',
    ...
    'MoipApi'	=> 'Artesaos\Moip\Facades\Moip',
),
```

#### Migrações
Para mover as migrações do moip para a pasta migrations de sua applicação, basta realizar o seguinte comando:
```
php artisan vendor:publish --provider="Artesaos\Moip\MoipServiceProvider" --tag="migrations"
```

Para executar as migrações recentemente movidas, basta realizar o comando a baixo:
```
php artisan migrate
