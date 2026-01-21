# PHP 8.6

PHP 8.1 introduced the First-class Callable Syntax (FCC). It was a great step against full partial Function Application. PHP 8.6 completes FCC.

* [PHP RFC: Partial Function Application (v2)>](https://wiki.php.net/rfc/partial_function_application_v2) (Status: In Implementation)

Make it even easier to work with functions that take multiple arguments by allowing use of placeholders.

## Using Partial Function Application (PFA)

### PHP 8.5 syntax:

```php
$string = '  Hello PHP 8.5 pipe operator ';
$result = $string
    |> trim(...)
    |> (fn($s) => preg_replace('/[^\w\s-]/','', $s))
    |> (fn($s) => str_replace(' ', '-', $s))
    |> strtolower(...);

var_dump($result); // Outputs: 'hello-php-85-pipe-operator'
```

### PHP 8.6 syntax:

```php
$string = '  Hello PHP 8.6 ';
$result = $string
    |> trim(...)
    |> preg_replace('/[^\w\s-]/','', ?)
    |> str_replace(' ', '-', ?)
    |> strtolower(...);

var_dump($result); // Will output: 'Hello PHP 8.6 partial function application'
```

## [> Home](../README.md) > [Index](index.md)
