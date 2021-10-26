## Install

- `git clone https://github.com/spekter2308/test_task.git`
- `cd test_task`
- `composer install`
- `cp .env.example .env` 
- `php artisan key:generate`
- `php artisan test`


## Tests

Tests for task located in the 'test\Unit\TerminalTest'. Tests from task's file named "test_one", "test_two", "test_three", "test_four".
Run `php artisan test`

## Mock data
Product data located in the '`app\MockData'. Product structure looks like
```php
<?php
  $product = [
    'A' => (object)[
    'code' => 'A',
    'price' => 2.00,
    'tax' => 10,
    'stockPrice' => 8.00,     // for stock products
    'stockQty' => 5,          // for stock products
    'related_code' => 'B'     // for related products
    ]];
?>```

## Functionality
Classes with main functionality located in the 'app\Services' folder.
