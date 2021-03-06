<p align="center"><a href="https://optidash.ai"><img src="media/logotype.png" alt="Optidash" width="143" height="45"/></a></p>

<p align="center">
Optidash is a modern, AI-powered image optimization and processing API.<br>We will drastically speed-up your websites and save you money on bandwidth and storage.
</p>

---
<p align="center">
<strong>The official Laravel facade for Optidash API.</strong><br>
<br>
<img src="https://img.shields.io/github/issues-raw/optidash-ai/optidash-laravel?style=flat&color=success"/>
<img src="https://img.shields.io/packagist/l/optidash-ai/optidash-laravel?style=flat&color=success"/>
<img src="https://img.shields.io/twitter/follow/optidashAI?label=Follow%20Us&style=flat&color=success&logo=twitter"/>
</p>

---

### Installation

To install the most recent version:

```bash
$ composer require optidash-ai/optidash-laravel
```

or add the following entry to your `composer.json`:

```js
"require": {
    "optidash-ai/optidash-laravel": "dev-master"
}
```

and then run `composer update`.

Laravel uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider. If you don't use auto-discovery, add the ServiceProvider to the providers array in `config/app.php`:

```php
Optidash\OptidashLaravel\OptidashServiceProvider::class
```

You may also add the following aliases to your `config/app.php`:

```php
'Optidash' => Optidash\OptidashLaravel\Facades\Optidash::class
```

### Configuration

Publish the configuration for the package which will create the config file `config/optidash.php`:

```bash
php artisan vendor:publish --provider="Optidash\OptidashLaravel\OptidashServiceProvider"
```

The last step is to provide your Optidash API Key by either setting env variable `OPTIDASH_APIKEY` in your `.env` file or by directly editing the `config/optidash.php` file.

If you don't have your Optidash API Key just yet, you can [sign-up for a free account](https://app.optidash.ai/signup) which comes with a monthly quota of 500 API calls.

### Quick example

This Laravel integration exposes all the operations available with the [Optidash API](https://docs.optidash.ai). The following example uses image `fetch` and streams the output file directly to disc with `toFile()` method:

```php
use Optidash;

Optidash::fetch('https://www.website.com/image.jpg')->optimize(array(
    'compression' => 'medium'
))
->resize(array(
	'width' => 640,
	'height' => 480
))
->filter(array(
    'blur' => array(
        'mode' => 'gaussian',
        'value' => 10
    )
))
->toFile('path/to/output.png', function ($error, $meta) {
    if (!empty($error)) {
        throw new Exception($error);
    }

    // You'll find the full JSON metadata within the `meta` variable
});
```

### License
This software is distributed under the MIT License. See the [LICENSE](LICENSE) file for more information.