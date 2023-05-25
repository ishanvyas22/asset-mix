# Using AssetMix Plugin when Serving CakePHP from a Subdirectory

To use the AssetMixHelper methods `$this->AssetMix->css('main)` and `$this->AssetMix->script('app')` when CakePHP is being served out of a subdirectory. For example you access your CakePHP application from https://example.com/subdir and NOT https://example.com/

Configure `App.base` with `/subdir`:

```php
    // config/app.php
   'App' => [
        'namespace' => 'App',
        'encoding' => env('APP_ENCODING', 'UTF-8'),
        'defaultLocale' => env('APP_DEFAULT_LOCALE', 'en_AU'),
        'defaultTimezone' => 'Australia/Melbourne',
        // comment or remove the default
        // 'base' => false,
        // hard coded
        'base' => '/subdir',
        // or pull from the environment to make it portable
        // 'base' => env('SUBDIR', false),
        'language' => 'en',
        'dir' => 'src',
        'webroot' => 'webroot',
        'wwwRoot' => WWW_ROOT,
        //... 
   ]
```
