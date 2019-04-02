# Unique Validation with combination For Laravel


This package is for unique validation with comma separated value('1,2,4') or other separated value('a-k-i') of sigle-column duplicate entry check.

## Installation

Install the package through [Composer](http://getcomposer.org).
On the command line:

```
composer require discover/uniquecombination-validation
```

## Configuration

Add the following to your `providers` array in `config/app.php`:

```php
'providers' => [
    // ...

    Discover\UniqueCombination\UniqueCombinationServiceProvider::class,
],
```

## Usage

Use it like any `Validator` :

```php
$validator = Validator::make($request->all(), [
    'title' => 'required|unique_combination:table_name,column_name,separator',
]);
```

See the [Validation documentation](http://laravel.com/docs/validation) of Laravel.

### Example

If you have a database table `my_table` and column which name is `column_1` and the value is `(25,36,21)` already exists.

Your input field name is `name_1` and `value` is `(36,21,25)`.
You want to check unique validation with your database column so that duplicate entry prevent with this comma separated combination:

```php
$validator = Validator::make($request->all(), [
    'name_1' => 'required|unique_combination:my_table,column_1,","',
]);
```

### Example-1

If you have a database table `my_table` and column which name is `name_string` and the value is `(akash-jhon-jannat)` already exists.

Your input field name is `name` and `value` is `(Jannat-Jhon-akash)`.
You want to check unique validation with your database column so that duplicate entry prevent with this comma separated combination:

```php
$validator = Validator::make($request->all(), [
    'name' => 'required|unique_combination:my_table,name_string,"-"',
]);
```

You can also use `any separator` like`('-','+')` as your need.
You can use and `sort of combination` this.
This package is `case-sensitive`

# License

MIT