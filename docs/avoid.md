# Pipe operator - when not to use it

While the PHP pipe operator can enhance code readability and maintainability in many scenarios,
there are situations where its use may not be appropriate. 
Here are some antipatterns to consider:

## Working with complex data structures

When dealing with complex data structures, using the pipe operator can lead to less readable code.
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
$number |> increment(...); // This will not work as expected
```

## [> Home](../README.md) > [Index](index.md)