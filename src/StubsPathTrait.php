<?php
namespace AssetMix;

trait StubsPathTrait
{
    /**
     * Returns `package.json` file path for vue
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
}
