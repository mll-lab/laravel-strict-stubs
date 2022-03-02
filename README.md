# laravel-strict-stubs

Strictly typed replacements for the default Laravel generator stubs

[![GitHub license](https://img.shields.io/github/license/mll-lab/laravel-strict-stubs.svg)](https://github.com/mll-lab/laravel-strict-stubs/blob/master/LICENSE)
[![Packagist](https://img.shields.io/packagist/v/mll-lab/laravel-strict-stubs.svg)](https://packagist.org/packages/mll-lab/laravel-strict-stubs)
[![Packagist](https://img.shields.io/packagist/dt/mll-lab/laravel-strict-stubs.svg)](https://packagist.org/packages/mll-lab/laravel-strict-stubs)

## Installation

    composer require --dev mll-lab/laravel-strict-stubs

## Usage

To continually keep your stubs updated with the latest and greatest
from this package, add the following to your `composer.json`:

```diff
    "scripts": {
        "post-update-cmd": [
            "Illuminate\\Foundation\\ComposerScripts::postUpdate",
+           "php artisan vendor:publish --tag=strict-stubs --force"
        ]
    }
```

To allow modifications, publish the stubs once:

    php artisan vendor:publish --tag=strict-stubs
