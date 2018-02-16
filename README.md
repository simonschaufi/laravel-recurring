# Laravel Recurring

[![Build Status](https://img.shields.io/travis/faustbrian/Laravel-Recurring/master.svg?style=flat-square)](https://travis-ci.org/faustbrian/Laravel-Recurring)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/faustbrian/laravel-recurring.svg?style=flat-square)]()
[![Latest Version](https://img.shields.io/github/release/faustbrian/Laravel-Recurring.svg?style=flat-square)](https://github.com/faustbrian/Laravel-Recurring/releases)
[![License](https://img.shields.io/packagist/l/faustbrian/Laravel-Recurring.svg?style=flat-square)](https://packagist.org/packages/faustbrian/Laravel-Recurring)

## Installation

Require this package, with [Composer](https://getcomposer.org/), in the root directory of your project.

``` bash
$ composer require faustbrian/laravel-recurring
```

## Usage

``` php
<?php

namespace App;

use BrianFaust\Recurring\Recurring;
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

If you discover a security vulnerability within this package, please send an e-mail to hello@brianfaust.me. All security vulnerabilities will be promptly addressed.

## Credits

- [Brian Faust](https://github.com/faustbrian)
- [All Contributors](../../contributors)

## License

[MIT](LICENSE) © [Brian Faust](https://brianfaust.me)
