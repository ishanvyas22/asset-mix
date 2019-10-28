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

- To generate script tag for compiled javascript file:

    ```php
    echo $this->Mix->script('app');
    ```
    
Above code with render:

    ```html
    <script src="/js/app.js"></script>
    ```
