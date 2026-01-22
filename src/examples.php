<?php
// This file contains copy-pasteable heredoc examples for running the PHP snippets
// from the docs/ markdown files. Each PHP example below is presented as a ready-
// to-run heredoc you can paste into a shell. Copy the contents of a block and
// paste it into your shell to run (it begins with `php <<'EOF'` and ends with
// `EOF`).

// Non-PHP snippets are preserved inside PHP block comments.

// NOTE: Pipe-based examples in this file are "reference" snippets that require
// PHP >= 8.5 (the pipe operator |>). If you get a syntax error like
// "unexpected token \">\"", your CLI PHP is older than 8.5. Use the helper
// script `scripts/run-pipe-examples.sh` to automatically detect your PHP
// version and run the pipe-based examples when supported.

// ---------- docs/basics.md - block 1 (lang: php) ----------
/*
php <<'EOF'
<?php
$string = 'Hello PHP 8.5 ';
$result = strtolower(trim($string));
var_dump($result);
EOF
*/

// ---------- docs/basics.md - block 2 (lang: php) ----------
// The original example in the docs uses the pipe operator; a pipe-based
// reference is shown first, followed by a compatibility variant.
/*
# Pipe-based (reference):
php <<'EOF'
<?php
$string = 'Hello PHP 8.5 ';
$result_pipe = $string |> trim(...) |> strtolower(...);
var_dump($result_pipe);
EOF
*/

/*
# Compatibility (equivalent without pipe):
php <<'EOF'
<?php
$string = 'Hello PHP 8.5 ';
$result = strtolower(trim($string));
var_dump($result);
EOF
*/

// ---------- docs/basics.md - block 3 (lang: shell) ----------
/*
Source: docs/basics.md - block 3 (lang: shell)
ls src | grep pipe | | awk '{print}

result="$(ls src | grep pipe)"
*/

// ---------- docs/more-use.md - block 1 (lang: php) ----------
/*
# Pipe-based (reference):
php <<'EOF'
<?php
$string = '  Hello PHP 8.5  ';
$result = $string
    |> (function($s) { return trim($s); })
    |> (function($s) { return strtoupper($s); });
var_dump($result);
EOF
*/

/*
# Compatibility (anonymous functions without pipe):
php <<'EOF'
<?php
$string = '  Hello PHP 8.5  ';
$result = (function($s) { return strtoupper($s); })((function($s) { return trim($s); })($string));
var_dump($result);
EOF
*/

// ---------- docs/more-use.md - block 2 (lang: php) ----------
/*
# Pipe-based (reference):
php <<'EOF'
<?php
$string = '  Hello PHP 8.5  ';
$result = $string
    |> (fn($s) => trim($s))
    |> (fn($s) => strtoupper($s));
var_dump($result);
EOF
*/

/*
# Compatibility (arrow functions unrolled):
php <<'EOF'
<?php
$string = '  Hello PHP 8.5  ';
$result = (fn($s) => strtoupper($s))((fn($s) => trim($s))($string));
var_dump($result);
EOF
*/

// ---------- docs/more-use.md - block 3 (lang: php) ----------
/*
# Pipe-based (reference):
php <<'EOF'
<?php
$string = '  Hello PHP 8.5  ';
$result = $string
    |> (fn($s) => str_replace('PHP', 'PHP Pipe', $s))
    |> (fn($s) => trim($s));
var_dump($result);
EOF
*/

/*
# Compatibility (unrolled):
php <<'EOF'
<?php
$string = '  Hello PHP 8.5  ';
$result = (fn($s) => trim($s))((fn($s) => str_replace('PHP', 'PHP Pipe', $s))($string));
var_dump($result);
EOF
*/

// ---------- docs/more-use.md - block 4 (lang: php) ----------
/*
# Placeholder-style (reference only):
php <<'EOF'
<?php
$string = '  Hello PHP 8.5  ';
$result = $string
    |> str_replace('PHP', 'PHP Pipe', ?)
    |> trim(?);
var_dump($result);
EOF
*/

// ---------- docs/avoid.md - block 1 (lang: php) ----------
/*
# Pipe-based (reference):
php <<'EOF'
<?php
$result = 'PHP Bergen' |> strtolower(...);
var_dump($result);
EOF
*/

/*
# Compatibility:
php <<'EOF'
<?php
$result = strtolower('PHP Bergen');
var_dump($result);
EOF
*/

// ---------- docs/avoid.md - block 2 (lang: php) ----------
/*
php <<'EOF'
<?php
$result = strtolower('PHP Bergen');
var_dump($result);
EOF
*/

// ---------- docs/avoid.md - block 3 (lang: php) ----------
/*
# Drupal pipe-based example (reference only — needs Drupal bootstrap):
php <<'EOF'
<?php
$nids = \Drupal::entityQuery('node')
    |> (fn($q) => $q->condition('type', 'article'))
    |> (fn($q) => $q->condition('status', 1))
    |> (fn($q) => $q->accessCheck(TRUE))
    |> (fn($q) => $q->execute());
var_dump($nids);
EOF
*/

// ---------- docs/avoid.md - block 4 (lang: php) ----------
/*
# Equivalent using method chaining (requires Drupal bootstrap):
php <<'EOF'
<?php
// NOTE: This example requires Drupal runtime.
$nids = \Drupal::entityQuery('node')
    ->condition('type', 'article')
    ->condition('status', 1)
    ->accessCheck(TRUE)
    ->execute();
var_dump($nids);
EOF
*/

// ---------- docs/avoid.md - block 5 (lang: php) ----------
/*
php <<'EOF'
<?php
function increment(int &$value): void {
    $value++;
}

$number = 5;
increment($number);
var_dump($number);
// The pipe-based form in the docs is shown for reference only:
// $number |> increment(...); // This will not work as expected
EOF
*/

// ---------- docs/useful-knowledge.md - block 1 (lang: php) ----------
/*
php <<'EOF'
<?php
function sum($a, $b, $c) {
    return $a + $b + $c;
}

$numbers = [1, 2, 3];
$result = sum(...$numbers); // equivalent to sum(1, 2, 3)
var_dump($result);
EOF
*/

// ---------- docs/useful-knowledge.md - block 2 (lang: php) ----------
/*
php <<'EOF'
<?php
function multiply(int ...$numbers): int {
    $product = 1;
    foreach ($numbers as $number) {
        $product *= $number;
    }
    return $product;
}

$values = [2, 3, 4];
$result = multiply(...$values); // equivalent to multiply(2, 3, 4)
var_dump($result);
EOF
*/

// ---------- docs/useful-knowledge.md - block 3 (lang: php) ----------
/*
php <<'EOF'
<?php
$array1 = [1, 2, 3];
$array2 = [0, ...$array1, 4, 5];
var_dump($array2); // [0,1,2,3,4,5]
EOF
*/

// ---------- docs/useful-knowledge.md - block 4 (lang: php) ----------
/*
php <<'EOF'
<?php
$words = ['Hello', 'from', 'PHP', 'Bergen'];
$uppercased = array_map(strtoupper(...), $words);
print_r($uppercased);
EOF
*/

// ---------- docs/useful-knowledge.md - block 5 (lang: php) ----------
/*
php <<'EOF'
<?php
$words = ['Hello', 'from', 'PHP', 'Bergen'];
$uppercased = array_map(function ($word) {
    return strtoupper($word);
}, $words);
print_r($uppercased);
EOF
*/

// ---------- docs/useful-knowledge.md - block 6 (lang: php) ----------
/*
php <<'EOF'
<?php
function concatenate(string ...$strings): string {
    return implode(' ', $strings);
}

$parts = ['Hello', 'from', 'PHP', 'Bergen'];
$result = concatenate(...$parts);
var_dump($result);
EOF
*/

// End of heredoc-ready snippets.
