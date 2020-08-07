<?php
namespace AssetMix;

use AssetMix\Command\AssetMixCommand;

trait StubsPathTrait
{
    /**
     * Returns base directory path of common stubs.
     *
     * @return string
     */
    public function getBaseCommonStubsPath(): string
    {
        return ASSET_MIX_ROOT . DS . 'stubs' . DS . 'common' . DS;
    }

    /**
     * Returns base directory path of vue stubs path.
     *
     * @return string
     */
    public function getBaseVueStubsPath()
    {
        return ASSET_MIX_ROOT . DS . 'stubs' . DS . 'vue' . DS;
    }

    /**
     * Returns base directory path of bootstrap stubs path.
     *
     * @return string
     */
    public function getBaseBootstrapStubsPath(): string
    {
        return ASSET_MIX_ROOT . DS . 'stubs' . DS . 'bootstrap' . DS;
    }

    /**
     * Returns base directory path of react stubs path.
     *
     * @return string
     */
    public function getBaseReactStubsPath(): string
    {
        return ASSET_MIX_ROOT . DS . 'stubs' . DS . 'react' . DS;
    }

    /**
     * Returns `package.json` file paths for vue
     *
     * @return array<string>
     */
    public function getVuePackageJsonPath()
    {
        $packageJsonPath = $this->getBaseCommonStubsPath() . 'package.json';

        return [
            'from' => $packageJsonPath,
            'to' => ROOT . DS . basename($packageJsonPath),
        ];
    }

    /**
     * Returns `package.json` file paths for bootstrap.
     *
     * @return array<string>
     */
    public function getBootstrapPackageJsonPath(): array
    {
        $packageJsonPath = $this->getBaseCommonStubsPath() . 'package.json';

        return [
            'from' => $packageJsonPath,
            'to' => ROOT . DS . basename($packageJsonPath),
        ];
    }

    /**
     * Returns `package.json` file paths for react.
     *
     * @return array<string>
     */
    public function getReactPackageJsonPath(): array
    {
        $packageJsonPath = $this->getBaseCommonStubsPath() . 'package.json';

        return [
            'from' => $packageJsonPath,
            'to' => ROOT . DS . basename($packageJsonPath),
        ];
    }

    /**
     * Returns `webpack.mix.js` file path for vue.
     *
     * @return array<string>
     */
    public function getVueWebpackMixJsPath()
    {
        $webpackConfigPath = $this->getBaseCommonStubsPath() . 'webpack.mix.js';

        return [
            'from' => $webpackConfigPath,
            'to' => basename($webpackConfigPath),
        ];
    }

    /**
     * Returns `webpack.mix.js` file path for bootstrap.
     *
     * @return array<string>
     */
    public function getBootstrapWebpackMixJsPath(): array
    {
        $webpackConfigPath = $this->getBaseCommonStubsPath() . 'webpack.mix.js';

        return [
            'from' => $webpackConfigPath,
            'to' => basename($webpackConfigPath),
        ];
    }

    /**
     * Returns `webpack.mix.js` file path for react.
     *
     * @return array<string>
     */
    public function getReactWebpackMixJsPath(): array
    {
        $webpackConfigPath = $this->getBaseReactStubsPath() . 'webpack.mix.js';

        return [
            'from' => $webpackConfigPath,
            'to' => basename($webpackConfigPath),
        ];
    }

    /**
     * Returns paths for `assets` directory files
     *
     * @param string|null $dirname Custom directory name.
     * @return array<string>
     */
    public function getVueAssetsDirPaths($dirname = null)
    {
        if ($dirname === null) {
            $dirname = AssetMixCommand::ASSETS_DIR_NAME;
        }

        $assetsDirPath = $this->getBaseVueStubsPath() . $dirname;

        return [
            'from_assets' => $assetsDirPath,
            'to_assets' => basename($assetsDirPath),
            'to_assets_css' => basename($assetsDirPath) . DS . 'css',
            'to_assets_js' => basename($assetsDirPath) . DS . 'js',
            'to_assets_js_app' => basename($assetsDirPath) . DS . 'js' . DS . 'app.js',
            'to_assets_js_components' => basename($assetsDirPath) . DS . 'js' . DS . 'components',
            'to_assets_sass' => basename($assetsDirPath) . DS . 'sass',
            'to_assets_sass_app' => basename($assetsDirPath) . DS . 'sass' . DS . 'app.scss',
        ];
    }

    /**
     * Returns paths of `assets` directory files for bootstrap.
     *
     * @param string|null $dirname Custom directory name.
     * @return array<string>
     */
    public function getBootstrapAssetsDirPaths($dirname = null): array
    {
        if ($dirname === null) {
            $dirname = AssetMixCommand::ASSETS_DIR_NAME;
        }

        $assetsDirPath = $this->getBaseBootstrapStubsPath() . $dirname;

        return [
            'from_assets' => $assetsDirPath,
            'to_assets' => basename($assetsDirPath),
            'to_assets_css' => basename($assetsDirPath) . DS . 'css',
            'to_assets_js' => basename($assetsDirPath) . DS . 'js',
            'to_assets_js_app' => basename($assetsDirPath) . DS . 'js' . DS . 'app.js',
            'to_assets_sass' => basename($assetsDirPath) . DS . 'sass',
            'to_assets_sass_app' => basename($assetsDirPath) . DS . 'sass' . DS . 'app.scss',
        ];
    }

    /**
     * Returns paths of `assets` directory files for react.
     *
     * @param string|null $dirname Custom directory name.
     * @return array<string>
     */
    public function getReactAssetsDirPaths($dirname = null): array
    {
        if ($dirname === null) {
            $dirname = AssetMixCommand::ASSETS_DIR_NAME;
        }

        $assetsDirPath = $this->getBaseReactStubsPath() . $dirname;

        return [
            'from_assets' => $assetsDirPath,
            'to_assets' => basename($assetsDirPath),
            'to_assets_css' => basename($assetsDirPath) . DS . 'css',
            'to_assets_js' => basename($assetsDirPath) . DS . 'js',
            'to_assets_js_app' => basename($assetsDirPath) . DS . 'js' . DS . 'app.js',
            'to_assets_sass' => basename($assetsDirPath) . DS . 'sass',
            'to_assets_sass_app' => basename($assetsDirPath) . DS . 'sass' . DS . 'app.scss',
        ];
    }
}
