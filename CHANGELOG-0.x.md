# Release Notes

## [Unreleased](https://github.com/ishanvyas22/asset-mix/compare/0.4.0...cake3)

### Added
- Add phpstan dependency ([#10](https://github.com/ishanvyas22/asset-mix/pull/10))
- Add CHANGLOG.md file ([#9](https://github.com/ishanvyas22/asset-mix/issues/9))

### Fixed
- Errors from phpstan ([#10](https://github.com/ishanvyas22/asset-mix/pull/10))

### Changed
- Remove check for PHP 7.0 in travis ci ([#10](https://github.com/ishanvyas22/asset-mix/pull/10))
- Add check for PHP 7.3 in travis ci ([#10](https://github.com/ishanvyas22/asset-mix/pull/10))
- Optimize travis checks by removing unit test command for each build ([#10](https://github.com/ishanvyas22/asset-mix/pull/10))
- Rename `CHANGLOG.md` to `CHANGELOG-0.x.md` file ([1248653](https://github.com/ishanvyas22/asset-mix/commit/1248653fb1e72980af11ac9e4e654fb8d8c13073))

## [0.4.0 (2019-11-09)](https://github.com/ishanvyas22/asset-mix/compare/0.3.2...0.4.0)

### Added
- Add `asset_mix generate` command ([#7](https://github.com/ishanvyas22/asset-mix/pull/7))
- Add Generate command section in README.md file ([86a0de63](https://github.com/ishanvyas22/asset-mix/commit/9ac452222d69a4ab684d43fcff5b85f286a0de63))
- Add step to compile assets in README.md file ([4c7724ca](https://github.com/ishanvyas22/asset-mix/commit/5e7b99aec6be46f4b27395bf37c480624c7724ca))

### Changed
- Drop dependency of symfony/filesystem, add dependency of league/flysystem ([#8](https://github.com/ishanvyas22/asset-mix/pull/8))

## [0.3.2 (2019-11-09)](https://github.com/ishanvyas22/asset-mix/compare/0.3.1...0.3.2)

### Added
- Added poser badges ([b1888ca4](https://github.com/ishanvyas22/asset-mix/commit/53e34fe1cd3a8909f64464679662da5bb1888ca4), [baa4064b](https://github.com/ishanvyas22/asset-mix/commit/6473779254872498f5355eea38966d7abaa4064b))
- Issue templates ([187db244](https://github.com/ishanvyas22/asset-mix/commit/60ef6d736c946e754785fab7253a2b93187db244))
- Added cakephp code sniffer package ([9ca452c3](https://github.com/ishanvyas22/asset-mix/commit/76340bbf5b6b3e5b3ff36b6f229984439ca452c3))
- Added travis.yml config

## [0.3.1 (2019-11-01)](https://github.com/ishanvyas22/asset-mix/compare/0.3.0...0.3.1)

### Added
- Tests to check `<style>` tag with and without versioning enabled ([22f8a1fa](https://github.com/ishanvyas22/asset-mix/pull/5/commits/191b57bd9bcfca791eea43ae9934268b22f8a1fa))
- Tests to check `<script>` tag with and without versioning enabled ([22f8a1fa](https://github.com/ishanvyas22/asset-mix/pull/5/commits/191b57bd9bcfca791eea43ae9934268b22f8a1fa))

### Changed
- Public path change to `WWW_ROOT` constant ([81882513](https://github.com/ishanvyas22/asset-mix/pull/5/commits/1a084d2dcbc311ce1d36a438d458dafe81882513))
- `composer.json` changes ([ff9bcc76](https://github.com/ishanvyas22/asset-mix/pull/5/commits/ed7ab236a8aa6ea0a9f87818f70d5858ff9bcc76))

## [0.3.0 (2019-10-31)](https://github.com/ishanvyas22/asset-mix/compare/0.2.0...0.3.0)

### Added
- `<script>` tag will now have the `defer` attribute by default ([#4](https://github.com/ishanvyas22/asset-mix/pull/4))
- `env()` function used instead of `$_SERVER` global variable ([#4](https://github.com/ishanvyas22/asset-mix/pull/4))
- `functions.php` loaded directly from composer instead of bootstrap file ([#4](https://github.com/ishanvyas22/asset-mix/pull/4))

### Changed
- Plugin name, namespace changed to AssetMix from Mix ([#4](https://github.com/ishanvyas22/asset-mix/pull/4))

## [0.2.0 (2019-10-28)](https://github.com/ishanvyas22/asset-mix/compare/0.1.0...0.2.0)

### Added
- Installation steps into README.md file ([#1](https://github.com/ishanvyas22/asset-mix/pull/1))
- Usage section into README.md file ([#1](https://github.com/ishanvyas22/asset-mix/pull/1))
- Reference section into README.md file ([#1](https://github.com/ishanvyas22/asset-mix/pull/1))
- Issues section into README.md file ([#1](https://github.com/ishanvyas22/asset-mix/pull/1))

## 0.1.0 (2019-10-26)

**Initial release.**

### Added
- Helper function `css()` to call build css files from `mix-manifest.json` file.
- Helper function `script()` to call build js files from `mix-manifest.json` file.
- Supports versioning through `version()` function in `webpack.mix.js` file.
