<?php
namespace AssetMix;

trait StubsPathTrait
{
    /**
     * Returns `package.json` file paths for vue
     *
     * @return array
     */
    public function getVuePackageJsonPath()
    {
        $packageJsonPath = __DIR__ . DS . '..' . DS . 'stubs' . DS . 'vue' . DS . 'package.json';

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
        $webpackConfigPath = __DIR__ . DS . '..' . DS . 'stubs' . DS . 'vue' . DS . 'webpack.mix.js';

        return [
            'from' => $webpackConfigPath,
            'to' => APP . basename($webpackConfigPath)
        ];
    }
}
