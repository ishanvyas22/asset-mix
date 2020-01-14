<?php
namespace AssetMix;

use AssetMix\Command\AssetMixCommand;

trait StubsPathTrait
{
    /**
     * Returns base directory path of vue stubs path
     *
     * @return string
     */
    public function getBaseVueStubsPath()
    {
        return __DIR__ . DS . '..' . DS . 'stubs' . DS . 'vue' . DS;
    }

    /**
     * Returns `package.json` file paths for vue
     *
     * @return array
     */
    public function getVuePackageJsonPath()
    {
        $packageJsonPath = $this->getBaseVueStubsPath() . 'package.json';

        return [
            'from' => $packageJsonPath,
            'to' => APP . basename($packageJsonPath)
        ];
    }

    /**
     * Returns `webpack.mix.js` file patha for vue
     *
     * @return array
     */
    public function getVueWebpackMixJsPath()
    {
        $webpackConfigPath = $this->getBaseVueStubsPath() . 'webpack.mix.js';

        return [
            'from' => $webpackConfigPath,
            'to' => APP . basename($webpackConfigPath)
        ];
    }

    /**
     * Returns paths for `assets` directory files
     *
     * @param string|null $dirname Custom directory name.
     * @return array
     */
    public function getVueAssetsDirPaths($dirname = null)
    {
        if ($dirname === null) {
            $dirname = AssetMixCommand::ASSETS_DIR_NAME;
        }

        $assetsDirPath = $this->getBaseVueStubsPath() . $dirname;

        return [
            'from_assets' => $assetsDirPath,
            'to_assets' => APP . basename($assetsDirPath),
            'to_assets_css' => APP . basename($assetsDirPath) . DS . 'css',
            'to_assets_js' => APP . basename($assetsDirPath) . DS . 'js',
            'to_assets_js_app' => APP . basename($assetsDirPath) . DS . 'js' . DS . 'app.js',
            'to_assets_js_components' => APP . basename($assetsDirPath) . DS . 'js' . DS . 'components',
            'to_assets_sass' => APP . basename($assetsDirPath) . DS . 'sass',
            'to_assets_sass_app' => APP . basename($assetsDirPath) . DS . 'sass' . DS . 'app.sass',
        ];
    }
}
