<?php
declare(strict_types=1);

namespace AssetMix;

use AssetMix\Command\AssetMixCommand;

trait StubsPathTrait
{
    /**
     * Returns base directory path of vue stubs path.
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
    public function getBaseVueStubsPath(): string
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
     * Returns `package.json` file paths for vue.
     *
     * @return array<string>
     */
    public function getVuePackageJsonPath(): array
    {
        $packageJsonPath = $this->getBaseVueStubsPath() . 'package.json';

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
        $packageJsonPath = $this->getBaseBootstrapStubsPath() . 'package.json';

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
    public function getVueWebpackMixJsPath(): array
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
     * Returns paths of `assets` directory files for vue.
     *
     * @param string|null $dirname Custom directory name.
     * @return array<string>
     */
    public function getVueAssetsDirPaths($dirname = null): array
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
}
