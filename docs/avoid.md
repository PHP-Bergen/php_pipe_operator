# Pipe operator - when not to use it

While the PHP pipe operator can enhance code readability and maintainability in many scenarios,
there are situations where its use may not be appropriate. 
Here are some usecases to consider:

## When the pipe operator adds more verbosity than clarity
I.e using the pipe operator for single transformations is most often pointless and adds unnecessary verbosity to the code.
For example, in the following code, the pipe operator add more verbosity than it removes:

```php
$result = 'PHP Bergen' |> strtolower(...);
```
Better to just use:

```php
$result = strtolower('PHP Bergen');
```

## Working with complex data structures with fluent APIs

When dealing with complex data structures with APIs that already chain naturally, using the pipe operator can lead to less readable code.
In such cases, traditional method calls or array manipulations may be clearer.

I.e when building a query or loading data through Drupal's core services,
using the pipe operator can make the code harder to read and understand.
The following code builds a Drupal entity query using the pipe operator:

```php
$nids = \Drupal::entityQuery('node')
    |> (fn($q) => $q->condition('type', 'article'))
    |> (fn($q) => $q->condition('status', 1))
    |> (fn($q) => $q->accessCheck(TRUE))
    |> (fn($q) => $q->execute());
```

In such a case, traditional method chaining is more readable.
Better use:

```php
$nids = \Drupal::entityQuery('node')
    ->condition('type', 'article')
    ->condition('status', 1)
    ->accessCheck(TRUE)
    ->execute();
```

## Pass-by-reference
The pipe operator does not support passing arguments by reference.
The following code attempts to use the pipe operator with a function that modifies its argument by reference:

```php
function increment(int &$value): void {
    $value++;
}

$number = 5;
$number |> increment(...); // PHP Warning:  Uncaught Error: increment(): Argument #1 ($value) could not be passed by reference

var_dump($number);
```

### [< More use](more-use.md) 

## [> Home](../README.md) > [Index](index.md)