Currency
================
Simple lib that provides currency conversion using Yahoo! webservices.

#### Installation via Composer
``` bash
$ composer require mateusjatenee/currency
```

#### Usage  

This lib provides a somehow fluent API. You just need to instantiate the `Currency` class with a base value and then use the `from` and `to` methods.  

Example of how to convert $10 to Euros:  

```php

<?php

use Mateusjatenee\Currency;

$currency = new Currency(10);

$euros = $currency->from('USD')->to('EUR')->get();

var_dump($euros);

?>

```

You can also use the `to` method multiple times, in a chainable way. Something like:  

```php 

<?php

use Mateusjatenee\Currency;

$currency = new Currency(10);

$brl = $currency->from('USD')->to('EUR')->to('BRL')->get(); // from USD to EUR then to BRL.
// or
$euros = $currency->from('USD')->to('EUR');
$brl = $euros->to('BRL')->get();

?>

```

#### Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information.

#### Running Tests
``` bash
$ composer test
```

#### Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for more details.

#### License
This library is licensed under the MIT license. Please see [License file](LICENSE.md) for more information.
