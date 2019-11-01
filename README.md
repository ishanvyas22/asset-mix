# AssetMix plugin for CakePHP

[![Latest Stable Version](https://poser.pugx.org/ishanvyas22/asset-mix/v/stable)](https://packagist.org/packages/ishanvyas22/asset-mix)
[![Total Downloads](https://poser.pugx.org/ishanvyas22/asset-mix/downloads)](https://packagist.org/packages/ishanvyas22/asset-mix)
[![License](https://poser.pugx.org/ishanvyas22/asset-mix/license)](https://packagist.org/packages/ishanvyas22/asset-mix)

Provides integration with your CakePHP application & [Laravel Mix](https://laravel-mix.com).

## Installation

1. Get project into your system

    Via [composer](https://packagist.org/packages/ishanvyas22/asset-mix):
    ```bash
    composer require ishanvyas22/asset-mix
    ```
2. Load plugin using below command:
    ```bash
    bin/cake plugin load AssetMix
    ```
3. Load `AssetMix` helper from the plugin into your `AppView.php` file:
    ```php
    $this->loadHelper('AssetMix.AssetMix');
    ```

## Usage

After compiling your assets(js, css) with laravel mix, it creates a `mix-manifest.json` file into your `webroot` directory which contains information to map the files.

- To generate script tag for compiled javascript file(s):

```php
echo $this->AssetMix->script('app');
```
    
Above code will render:

```html
<script src="/js/app.js" defer="defer"></script>
```

As you can see it works same as [Html helper](https://book.cakephp.org/3.0/en/views/helpers/html.html#linking-to-javascript-files). There is not need to provide full path or even file extension.

- To generate style tag for compiled css file(s):

```php
echo $this->AssetMix->css('main');
```

Output:

```html
<link rel="stylesheet" href="/css/main.css">
```

If [versioning](https://laravel-mix.com/docs/4.0/versioning) is enabled, output will look something like below:

```html
<link rel="stylesheet" href="/css/main.css?id=9c4259d5465e35535a2a">
```

## Reference
To see this plugin into action you can refer to this [project](https://github.com/ishanvyas22/cakephpvue-spa), which will provide more insight.

## Issues
Feel free to submit issues and enhancement requests.
