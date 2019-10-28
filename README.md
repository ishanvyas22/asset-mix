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


