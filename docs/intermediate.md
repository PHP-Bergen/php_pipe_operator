# PHP Pipe Operator - Intermediate Usage

## Using with anonymous or arrow functions
You can use the pipe operator with anonymous.

```php
$string = '  Hello PHP 8.5  ';
$result = $string
    |> (function($s) { return trim($s); })
    |> (function($s) { return strtoupper($s); });
```

Arrow functions provide a more concise syntax for anonymous functions.
```php
$string = '  Hello PHP 8.5  ';
$result = $string
    |> (fn($s) => trim($s))
    |> (fn($s) => strtoupper($s));
```

## Using with functions that take multiple arguments
When using functions that take multiple arguments, you need to use an anonymous function, or arrow function, to pass the piped argument at it's desired position and provide the rest of the arguments.
```php
$string = '  Hello PHP 8.5  ';
$result = $string
    |> (fn($s) => str_replace('PHP', 'PHP Pipe', $s))
    |> (fn($s) => trim($s));
```
PHP 8.6 is expected to introduce "partial function application" which will simplify this even further by adding placeholder support using `?`.
```php
$string = '  Hello PHP 8.5  ';
$result = $string
    |> str_replace('PHP', 'PHP Pipe', ?)
    |> trim(?);
```

## [> Home](../README.md) > [Index](index.md)