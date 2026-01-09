<?php

$string = 'Hello PHP 8.5 ';
$result = strtolower(trim($string));

// Using the pipe operator.
$result_pipe = $string |> trim(...) |> strtolower(...);
var_dump($result === $result_pipe); // true

// First callable function.
function sum(int $a, int $b): int
{
    return $a + $b;
}

$foo = sum(...);
echo $foo(a: 1, b: 2) . PHP_EOL;
echo $foo(2, 2) . PHP_EOL;

final readonly class User {
    public function __construct(public string $name, public bool $admin) {}

    public function isAdmin(): bool {
        return $this->admin;
    }
}

final class Repository {
    private array $users = [];
    public function fetchUsers(): Repository
    {
        $this->users[] = new User('PHP', true);
        $this->users[] = new User('Bergen', false);
        $this->users[] = new User('Test', true);
        return $this;
    }
    public function filter(Closure $param)
    {
        $this->users = array_filter($this->users, $param);
        return $this;
    }
    public function count(): int
    {
        return count($this->users);
    }
}

$userRepository = new Repository();
$numberOfAdmins = $userRepository
  ->fetchUsers()
  ->filter(fn(User $user): bool => $user->isAdmin())
  ->count();
var_dump($numberOfAdmins);

// PHP 8.5
final class NewRepository {
    private array $users = [];
    public function fetchUsers(): array
    {
        $this->users[] = new User('PHP', true);
        $this->users[] = new User('Bergen', false);
        $this->users[] = new User('Test', true);
        return $this->users;
    }
}

$userRepository = new NewRepository();
$numberOfAdmins = $userRepository->fetchUsers()
      |> (fn (array $list) => array_filter($list, fn(User $user) : bool => $user->isAdmin()))
      |> count(...);

// PHP 8.6
// $numberOfAdmins = $userRepository->fetchUsers() |> array_filter(?, fn(User $user): bool => $user->isAdmin());
