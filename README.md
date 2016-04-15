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
