# Unique Validation with combination For Laravel


This package allows for unique validation with comma separated/other separated of sigle-column UNIQUE indexes.

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
$request->validate([
    'title' => 'required|unique_combination:table_name,column_name,separator',
]);
```

See the [Validation documentation](http://laravel.com/docs/validation) of Laravel.

### Example

If you have a database table `my_table` and column which name is `column_1` and the value is `(25,36,21)` already exists.

Your input field name is `name_1` and `value` is `(36,21,25)`.
You want to check unique validation with your database column so that duplicate entry prevent with this comma separated combination:

```php
$request->validate([
    'name_1' => 'required|unique_combination:my_table,column_1,","',
]);
```
You can also use `any separator` like`('-','+')` as your need.
You can use and `sort of combination` this

# License

MIT