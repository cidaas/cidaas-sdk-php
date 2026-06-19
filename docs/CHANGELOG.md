# [2.0.0](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/compare/v1.3.4...v2.0.0) (2026-06-19)


### Bug Fixes

* [#143](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/issues/143) added code coverage ([8ddc9ba](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/8ddc9baa1e3fe506e0c1ee91ff4071283e7c2801))
* [#143](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/issues/143) enable xdebug for code coverage ([9b4cae6](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/9b4cae67e4966802c20ceeabf917303fc853c7a7))
* [#143](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/issues/143) remove printenv ([ee71950](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/ee719502cefae02d8625daffa396e6779c4e7bdd))
* # enable xdebug for codecoverage ([79356bb](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/79356bb977fffa532a892bb1002bed6b868788d4))
* # enabling xdebug mode ([3ee13d3](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/3ee13d3be9a803f4e544bac7a63deb04ba305595))
* drop pinned tar version in codecoverage job ([8ac8b29](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/8ac8b29489af12bc8c4d099697c913e785cb2ea2))


* feat!: require PHP 8.2 and encode OAuth browser redirect URLs ([86857d7](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/86857d7bacf7dc18a816781dd62a267258201cde))


### BREAKING CHANGES

* Minimum supported PHP version is now 8.2. PHP 7.4, 8.0, and 8.1 are no longer supported. Dev tooling upgraded to PHPUnit 10.

- Build loginWithBrowser and registerWithBrowser URLs with http_build_query
- Run CI on PHP 8.2/8.3 and develop/development branches
- Document branching and PHP 8.2 requirement in README
- Add redirect encoding regression tests and PHPUnit 10 config

Co-authored-by: Cursor <cursoragent@cursor.com>

## [Unreleased]

### BREAKING CHANGES

* Minimum supported PHP version raised from 7.4 to **8.2**. PHP 7.4, 8.0, and 8.1 are no longer supported.
* PHPUnit upgraded from 9.x to **10.5** (dev dependency; requires PHP 8.1+).

### Features

* Build hosted login and registration redirect URLs with `http_build_query` so `redirect_uri` and custom query parameters are URL-encoded correctly (`loginWithBrowser`, `registerWithBrowser`).
* Run GitHub Actions CI on PHP **8.2** and **8.3** for pushes and pull requests to `master`, `main`, `develop`, and `development`.
* Document branching strategy and PHP 8.2 requirement in README.

### Bug Fixes

* Remove unused `$client` variable in `loginWithBrowser`.

### Tests

* Add regression tests for encoded redirect URIs and query parameters in `LoginWithBrowserTest`.
* Update PHPUnit configuration for PHPUnit 10.

## [1.3.4](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/compare/v1.3.3...v1.3.4) (2024-07-29)


### Bug Fixes

* [#143](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/issues/143) code coverage added ([bc9a1bd](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/bc9a1bda48aead913cdf1d00725bb9fb491eb143))
* [#143](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/issues/143) Failing Badges on some Projects issue fixes ([7618bcd](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/7618bcddd8a3eb7924cd61f045a9f52d830cf748))

## [1.3.3](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/compare/v1.3.2...v1.3.3) (2024-02-07)


### Bug Fixes

* cidaas v3 password reset flow support ([e11b874](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/e11b8742e803c18a5dd7401c23ebf6eaceee76d2))
* update endpoint for cidaas v3 ([d2311fa](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/d2311fa48584e61773b5bd29901bb1085fab7e66))

## [1.3.2](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/compare/v1.3.1...v1.3.2) (2024-01-16)


### Bug Fixes

* add default value to func param pkceEnabled ([942c695](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/942c6951be811e0bb29c0992c82d446d2170c87c))

## [1.3.1](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/compare/v1.3.0...v1.3.1) (2024-01-03)


### Bug Fixes

* add pkce feature ([4d8f231](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/4d8f231848f8a1822fa82fda09b6f53361536f58))
* update readme with pkce flow ([d69ab70](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/d69ab70283c6e52e6b8fc2e3c5dedff3dc7d782f))

# [1.3.0](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/compare/v1.2.2...v1.3.0) (2023-11-28)


### Bug Fixes

* skip code coverage ([e72ddea](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/e72ddea5e0be7c295cc62466dc38b49313efbe08))


### Features

* php sdk enhancement ([08557e2](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/08557e2236f67ca58fc9c5a908b2b6fe9c7f3718))

## [1.2.2](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/compare/v1.2.1...v1.2.2) (2023-10-20)


### Bug Fixes

* create tag on master ([e73e263](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/e73e26330406d9ae84a72c6c29814e7446dd7a02))
