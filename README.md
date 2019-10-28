# Mix plugin for CakePHP

Provides integration with your CakePHP application & [Laravel Mix](https://laravel-mix.com).

## Installation

1. Get project into your system

    Via [composer](https://packagist.org/packages/ishanvyas22/asset-mix):
    ```bash
    composer require ishanvyas22/asset-mix
    ```
    Via cloning the project into your server:
    ```bash
    git clone git@github.com:ishanvyas22/asset-mix.git
    ```
2. Load plugin using below command:
    ```bash
    bin/cake plugin load Mix -b
    ```
3. Load `Mix` helper from the plugin into your `AppView.php` file:
    ```php
    $this->loadHelper('Mix.Mix');
    ```

## Usage

After compiling your assets(js, css) with laravel mix, it creates a `mix-manifest.json` file into your `webroot` directory which contains information to map the files.

- To generate script tag for compiled javascript file(s):

```php
echo $this->Mix->script('app');
```
    
Above code with render:

```html
<script src="/js/app.js"></script>
```

As you can see it works same as [Html helper](https://book.cakephp.org/3.0/en/views/helpers/html.html#linking-to-javascript-files). There is not need to provide full path or even file extension.

- To generate style tag for compiled css file(s):

```php
echo $this->Mix->css('main');
```

Output:

```html
<link rel="stylesheet" href="/css/main.css">
```

If [versioning](https://laravel-mix.com/docs/4.0/versioning) is enabled, output will look something like below:

```html
<link rel="stylesheet" href="/css/main.css?id=9c4259d5465e35535a2a">
```
