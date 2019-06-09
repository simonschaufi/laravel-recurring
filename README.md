# Laravel Recurring

[![Build Status](https://img.shields.io/travis/artisanry/Recurring/master.svg?style=flat-square)](https://travis-ci.org/artisanry/Recurring)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/artisanry/recurring.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/artisanry/Recurring.svg?style=flat-square)](https://github.com/artisanry/Recurring/releases)
[![License](https://img.shields.io/packagist/l/artisanry/Recurring.svg?style=flat-square)](https://packagist.org/packages/artisanry/Recurring)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require artisanry/recurring
```

## Usage

``` php
<?php

namespace App;

use Artisanry\Recurring\Recurring;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Recurring;
}
```

```php
Route::get('/', function () {
    $task = App\Task::first();

    $task->recurr()->first();

    $task->recurr()->last();

    $task->recurr()->next();

    $task->recurr()->current();

    $task->recurr()->rule();

    $task->recurr()->schedule();
});
```

## Testing

``` bash
$ phpunit
```

## Security

If you discover a security vulnerability within this package, please send an e-mail to hello@basecode.sh. All security vulnerabilities will be promptly addressed.

## Credits

This project exists thanks to all the people who [contribute](../../contributors).

## License

Mozilla Public License Version 2.0 ([MPL-2.0](./LICENSE)).
