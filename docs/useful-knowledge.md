# Pipe operator - useful knowledge

## The `...` token

When working with the pipe operator, you will often cross paths with the `...` token.
Depending on the context, this token can represent different things that it is useful to understand beforehand:

- PHP First-class Callable Syntax
- The PHP Spread Operator
- Variadic parameters

It is the first-class callable syntax that is most relevant when working with the pipe operator, but understanding the other two concepts will help avoid confusion.

### PHP First-class Callable Syntax
PHP 8.1 - [RFC >](https://wiki.php.net/rfc/first_class_callable_syntax)

With first-class callable syntax, you write:
```php
$callable = some_function(...);
```

This is equivalent to writing prior to PHP 8.1:
```php
$callable = Closure::fromCallable('some_function');
```

The first-class callable syntax (`...`) produces a callable that, when invoked,
calls the specified function or method with all arguments passed to it.

Conceptually, it behaves similar to this:
```php
$callable = function (...$args) {
    return some_function(...$args);
};
```
PHP does not actually generate a new wrapper function behind the scenes,
but rather it creates an optimized callable that references the original function directly.

Example:
```php
$words = ['Hello', 'from', 'PHP', 'Bergen'];
$uppercased = array_map(strtoupper(...), $words);

print_r($uppercased); // Outputs: ['HELLO', 'FROM', 'PHP', 'BERGEN']
```

Equivalent, using `Closure::fromCallable`:
```php
$words = ['Hello', 'from', 'PHP', 'Bergen'];
$callable = Closure::fromCallable('strtoupper');
$uppercased = array_map($callable, $words);

print_r($uppercased); // Outputs: ['HELLO', 'FROM', 'PHP', 'BERGEN']
```

Not fully equivalent, but behave the same way as the above, without first-class callable syntax:
```php
$words = ['Hello', 'from', 'PHP', 'Bergen'];
$uppercased = array_map(function ($word) {
    return strtoupper($word);
}, $words);

print_r($uppercased); // Outputs: ['HELLO', 'FROM', 'PHP', 'BERGEN']
```

### The PHP spread sperator (aka splat operator)
The spread operator (`...`) allows an array or Traversable to be expanded into it's individual elements.
Available in PHP for argument unpacking since PHP 5.6, array unpacking since 7.4 and array unpacking with string keys since PHP 8.1.

#### Argument unpacking:
PHP 5.6 - [RFC >](https://wiki.php.net/rfc/argument_unpacking)
```php
function sum($a, $b, $c) {
    return $a + $b + $c;
}

$numbers = [1, 2, 3];
$result = sum(...$numbers); // equivalent to sum(1, 2, 3)
```

#### Array unpacking:
PHP 7.4 - [RFC >](https://wiki.php.net/rfc/spread_operator_for_array)

```php
$array1 = [1, 2, 3];
$array2 = [0, ...$array1, 4, 5]; // $array2 is [0, 1, 2, 3, 4, 5]
```

#### Array unpacking with string keys:
PHP 8.1 - [RFC >](https://wiki.php.net/rfc/array_unpacking#unpacking_arrays_with_string_keys)

```php
$array1 = ['a' => 1, 'b' => 2];
$array2 = ['c' => 3, ...$array1, 'd' => 4]; // $array2 is ['c' => 3, 'a' => 1, 'b' => 2, 'd' => 4]
```

### Variadic parameters
PHP 5.6 -  [RFC >](https://wiki.php.net/rfc/variadics)

Variadic parameters allow a function to accept an arbitrary number of arguments as an array, and it **must** be the last parameter in the function signature.
Although it uses the same notation (`...$arg`), it is **NOT** the same as the spread operator.

```php
function multiply(int ...$numbers): int { // <-- variadic parameter
    $product = 1;
    
    foreach ($numbers as $number) {
        $product *= $number;
    }
    
    return $product;
}

$values = [2, 3, 4];
$result = multiply(...$values); // <-- argument unpacking  - equivalent to multiply(2, 3, 4)
echo $result; // Outputs: 24
```


### [< Basics](basics.md) | [More use >](more-use.md)

## [> Home](../README.md) > [Index](index.md)


 