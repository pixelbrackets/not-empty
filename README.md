# not empty()

[![Version](https://img.shields.io/packagist/v/pixelbrackets/not-empty.svg?style=flat-square)](https://packagist.org/packages/pixelbrackets/not-empty/)
[![Build Status](https://img.shields.io/gitlab/pipeline/pixelbrackets/not-empty?style=flat-square)](https://gitlab.com/pixelbrackets/not-empty/pipelines)
[![Made With](https://img.shields.io/badge/made_with-php-blue?style=flat-square)](https://gitlab.com/pixelbrackets/not-empty#requirements)
[![License](https://img.shields.io/badge/license-gpl--2.0--or--later-blue.svg?style=flat-square)](https://spdx.org/licenses/GPL-2.0-or-later.html)

Add methods to determine whether a variable is blank or present.

Inspired by Ruby on Rails.

## Idea

This package is a hackathon product. Idea was to port the
[Ruby on Rails methods](https://blog.appsignal.com/2018/09/11/differences-between-nil-empty-blank-and-present.html)
`blank` and `present` to PHP.

PHP has the [empty](https://www.php.net/manual/en/function.empty.php) method,
but more often I need to check whether  a variable is not empty.
That's why  a `notEmpty` method is available as well.

See the list below to compare the different behaviour of these methods.

```
┌─────────────────────────┬─────────┬────────────┬─────────┬───────────┐
│          VALUE          │ EMPTY() │ NOTEMPTY() │ BLANK() │ PRESENT() │
├─────────────────────────┼─────────┼────────────┼─────────┼───────────┤
│ string ''               │ true    │            │ true    │           │
│ string 'acme'           │         │ true       │         │ true      │
│ string ' '              │         │ true       │ true    │           │
│ string '   '            │         │ true       │ true    │           │
│ string "\t\n"           │         │ true       │ true    │           │
│ int 0                   │ true    │            │ true    │           │
│ float 0.0               │ true    │            │ true    │           │
│ int 42                  │         │ true       │         │ true      │
│ float 3.14              │         │ true       │         │ true      │
│ string '0'              │ true    │            │ true    │           │
│ string '1337'           │         │ true       │         │ true      │
│ null                    │ true    │            │ true    │           │
│ bool true               │         │ true       │         │ true      │
│ bool false              │ true    │            │ true    │           │
│ array []                │ true    │            │ true    │           │
│ array ['acme']          │         │ true       │         │ true      │
│ object {}               │         │ true       │ true    │           │
│ object {"foo" => "bar"} │         │ true       │         │ true      │
└─────────────────────────┴─────────┴────────────┴─────────┴───────────┘
```

## Requirements

- PHP

## Installation

Packagist Entry https://packagist.org/packages/pixelbrackets/not-empty/

## Source

https://gitlab.com/pixelbrackets/not-empty/

Mirror https://github.com/pixelbrackets/not-empty/

## Usage

See [tests/demo.php](./tests/demo.php).

**⚠️The current branch »global« adds the functions to the global namespace!**

**Use the main branch to have namespaced methods.**

```php
# Is a string empty? → Use PHPs »empty«
if (empty('')) { … }

# Is a string not empty? → Use »empty() === false«
if (empty('acme') === false) { … }

# → …or use »notEmpty« instead
if (notEmpty('acme')) { … }

# A strings with whitespaces is blank → use a combination of conditions
if (is_string('   ') && empty(trim('   '))) { … }

# → …or use »blank« instead
if (blank('   ')) { … }

# → use »present« to check the opposite of »blank«
if (present('acme')) { … }
```

💡 If you want to use the methods as global functions (`blank()` instead of
the namespaced `Pixelbrackets\NotEmpty\Blank::blank()`) then install the
»global« branch, using `composer require pixelbrackets/not-empty:dev-global`.

## License

GNU General Public License version 2 or later

The GNU General Public License can be found at http://www.gnu.org/copyleft/gpl.html.

## Author

Dan Untenzu (<mail@pixelbrackets.de> / [@pixelbrackets](https://pixelbrackets.de))

## Changelog

See [./CHANGELOG.md](CHANGELOG.md)

## Contribution

This script is Open Source, so please use, patch, extend or fork it.

This package is not in active delopment, contributions are welcome though.
