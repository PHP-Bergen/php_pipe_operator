# Pipe operator - the basics

* [RFC: Pipe Operator (|>)](https://wiki.php.net/rfc/pipe-operator-v3)

Definition: ```mixed |> callable;```

## Using the pipe operator

Before PHP 8.5.

```php
$string = 'Hello PHP 8.5 ';
$result = strtolower(trim($string));
```

Using the pipe operator:

```php
$result_pipe = $string |> trim(...) |> strtolower(...);

```

Pipes whatever that is on the left hand to the right hand. Notice the use of the the first-class callable syntax  `...` Introduced in [PHP 8.1}(https://wiki.php.net/rfc/first_class_callable_syntax).

Left to right? I think we have seen this before.

```shell
ls src | grep pipe | | awk '{print}

result="$(ls src | grep pipe)"
```

## [> Home](../README.md) > [Index](index.md)