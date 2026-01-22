# <img src="../images/elephpant_100.png" width="30"> PHP Pipe Operator - More use

## More examples of using the PHP pipe operator (`|>`)

### Using with anonymous or arrow functions
You can use the pipe operator with anonymous functions.

```php
$string = '  Hello PHP 8.5  ';
$result = $string
    |> (function($s) { return trim($s); })
    |> (function($s) { return strtoupper($s); });
    
var_dump($result); // Outputs: 'HELLO PHP 8.5'
```

Arrow functions provide a more concise syntax for anonymous functions.
```php
$string = '  Hello PHP 8.5  ';
$result = $string
    |> (fn($s) => trim($s))
    |> (fn($s) => strtoupper($s));

var_dump($result); // Outputs: 'HELLO PHP 8.5'
```

### Using with functions that take multiple arguments
When using functions that take multiple arguments, you need to use an anonymous function, or arrow function, to pass the piped argument at it's desired position and provide the rest of the arguments.
```php
$string = '  Hello PHP 8.5  ';
$result = $string
    |> (fn($s) => str_replace('8.5', '8.5 pipe operator', $s))
    |> (fn($s) => trim($s));

var_dump($result); // Outputs: 'Hello PHP 8.5 pipe operator'
```

### Replacing deeply nested function calls
Before PHP 8.5, we might have code with deeply nested function calls that can be hard to read.

This code can quickly become hard to read:
```php
$string = '  Hello PHP 8.5 pipe operator ';
$result = strtolower(
    str_replace(' ', '-',
        preg_replace('/[^\w\s-]/','',
            trim($string)
        )
    )
);

var_dump($result); // Outputs: 'hello-php-85-pipe-operator'
```

Using temporary variables can help, but it adds verbosity:
```php
$string = '  Hello PHP 8.5 pipe operator ';
$trimmed = trim($string);
$cleaned = preg_replace('/[^\w\s-]/','', $trimmed);
$replaced = str_replace(' ', '-', $cleaned);
$result = strtolower($replaced);

var_dump($result); // Outputs: 'hello-php-85-pipe-operator'
```

With the pipe operator, we can express the same logic in a more readable left-to-right manner:
```php
$string = '  Hello PHP 8.5 pipe operator ';
$result = $string
    |> trim(...)
    |> (fn($s) => preg_replace('/[^\w\s-]/','', $s))
    |> (fn($s) => str_replace(' ', '-', $s))
    |> strtolower(...);

var_dump($result); // Outputs: 'hello-php-85-pipe-operator'
```

### [< Prior knowledge](useful-knowledge.md) | [Avoid >](avoid.md)

## [> Home](../README.md) > [Index](index.md)