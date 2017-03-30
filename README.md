# Package for API v2 MoIP
----------------------
> Current Status Package

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/artesaos/moip/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/artesaos/moip/?branch=master)
[![Code Climate](https://codeclimate.com/github/artesaos/moip/badges/gpa.svg)](https://codeclimate.com/github/artesaos/moip)
[![Build Status](https://scrutinizer-ci.com/g/artesaos/moip/badges/build.png?b=master)](https://scrutinizer-ci.com/g/artesaos/moip/build-status/master)
[![Codacy Badge](https://www.codacy.com/project/badge/61b5d36f2e544ffea6fa79ae316cc9d6)](https://www.codacy.com/app/jeancesargarcia/moip)

> Statistics

[![Total Downloads](https://poser.pugx.org/artesaos/moip/downloads)](https://packagist.org/packages/artesaos/moip)
[![Monthly Downloads](https://poser.pugx.org/artesaos/moip/d/monthly)](https://packagist.org/packages/artesaos/moip)
[![Daily Downloads](https://poser.pugx.org/artesaos/moip/d/daily)](https://packagist.org/packages/artesaos/moip)

> Version

[![Latest Stable Version](https://poser.pugx.org/artesaos/moip/v/stable)](https://packagist.org/packages/artesaos/moip)
[![Latest Unstable Version](https://poser.pugx.org/artesaos/moip/v/unstable)](https://packagist.org/packages/artesaos/moip)


> Tips

<a href="http://zenhub.io" target="_blank"><img src="https://raw.githubusercontent.com/ZenHubIO/support/master/zenhub-badge.png" height="18px" alt="Powered by ZenHub"/></a>

> License

[![License](https://poser.pugx.org/artesaos/moip/license)](https://packagist.org/packages/artesaos/moip)


## Installation

#### Composer

Start by adding the package to require your composer.json

```shell
composer require artesaos/moip
```

Having loaded dependencies and installed on your project, we will add ServiceProvider and facade.

### ServiceProvider
You need to update your application configuration in order to register the package so it can be loaded by Framework.

#### Laravel
Just update your `config/app.php` file adding the following code at the end of your `'providers'` section:

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
Go to `/bootstrap/app.php` file and add this line:

```php
// file START ommited
	$app->register(Artesaos\Moip\Providers\MoipServiceProvider::class);
// file END ommited
```

#### Facade
Adding a new item on its facade

```php
'aliases' => array(
	'App'     => Illuminate\Support\Facades\App::class,
	'Artisan' => Illuminate\Support\Facades\Artisan::class,
	...
	'Moip'    => Artesaos\Moip\Facades\Moip::class,
),
```

#### Settings
To move the MoIP settings file to the Settings folder of your application, simply perform the following command:

```shell
php artisan vendor:publish
```

or
```shell
php artisan vendor:publish --provider="Artesaos\Moip\Providers\MoipServiceProvider"
```

If you have already published the files, but for some reason need to override them, add the flag '--force' at the end of the previous command.

```shell
php artisan vendor:publish --provider="Artesaos\Moip\Providers\MoipServiceProvider" --force
```

His `.env` file, add the following values

```
MOIP_KEY=yourkeyfortheservice
MOIP_TOKEN=yourtokefortheservice
MOIP_HOMOLOGATED=keyshomologatedtrueorfalse
```

## Using

```php
$moip = Moip::start();
```

#### Creating a buyer

In this example we will create a request with customer data - With delivery and payment address.
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
#### Creating an application with the buyer we just created

In this example with various products and also specifying freight value, additional value and further discount amount.

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

#### Creating payment

After creating the application simply create a payment request.
In this example we are paying by credit card.

```php
try {
    $payment = $order->payments()->setCreditCard(12, 21, '4073020000000002', '123', $customer)
        ->execute();

    dd($payment);
} catch (Exception $e) {
    dd($e->__toString());
}
```

## Package for MoIP API v1 - Laravel 4

To use the package with Laravel 4 [clique aqui](https://github.com/SOSTheBlack/moip), This package is integrated only with the V1 API MoIP

## Documentation

[Official documentation](https://dev.moip.com.br/)

## License

[The MIT License](https://github.com/artesaos/moip/blob/master/LICENSE)
