# Direct.

Use this method if you already get a credit card details somehow, and you just have to send them to Stripe.

## config.php

We have to only add the gateway factory. All the rest remain the same:

```php
<?php
//config.php

// ..

$factory = new \Payum\Stripe\StripeCheckoutGatewayFactory();
$gateways['stripe'] = $factory->create(array(
    'publishable_key' => 'EDIT IT', 'secret_key' => 'EDIT IT'
));
```

## prepare.php

Do next:

```
use Payum\Core\Model\CreditCard;

// ...

$card = new CreditCard();
$card->setNumber('4111111111111111');
$card->setExpireAt(new \DateTime('2018-10-10'));
$card->setSecurityCode(123);

$order->setCreditCard($card);
```

Here you have to modify a `gatewayName` value. Set it to `stripe`. And create and populate a credit card object. 
The rest remain the same as described basic [get it started](https://github.com/Payum/Core/blob/master/Resources/docs/get-it-started.md) documentation.
 
## Next 

* [Core's Get it started](https://github.com/Payum/Core/blob/master/Resources/docs/get-it-started.md).
* [The architecture](https://github.com/Payum/Core/blob/master/Resources/docs/the-architecture.md).
* [Supported gateways](https://github.com/Payum/Core/blob/master/Resources/docs/supported-gateways.md).
* [Storages](https://github.com/Payum/Core/blob/master/Resources/docs/storages.md).
* [Capture script](https://github.com/Payum/Core/blob/master/Resources/docs/capture-script.md).
* [Authorize script](https://github.com/Payum/Core/blob/master/Resources/docs/authorize-script.md).
* [Done script](https://github.com/Payum/Core/blob/master/Resources/docs/done-script.md).

Back to [index](index.md).
