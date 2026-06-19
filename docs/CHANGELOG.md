## [2.0.1](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/compare/v2.0.0...v2.0.1) (2026-06-19)


### Bug Fixes

* update versions in changelog ([26960d0](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/26960d0a52d6942b13bc87620c5b7843a93120d6))
* update versions in changelog ([211c2fd](https://gitlab.widas.de/cidaas-public-devkits/cidaas-public-sdks/cidaas-sdk-php/commit/211c2fd03cf1e940a9ff428d8730df235d6de7bc))

## 2.0.0

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

## 1.3.4

### Bug Fixes

* #143 code coverage added
* #143 Failing Badges on some Projects issue fixes

## 1.3.3

### Bug Fixes

* cidaas v3 password reset flow support
* update endpoint for cidaas v3

## 1.3.2

### Bug Fixes

* add default value to func param pkceEnabled

## 1.3.1

### Bug Fixes

* add pkce feature
* update readme with pkce flow

## 1.3.0

### Bug Fixes

* skip code coverage

### Features

* php sdk enhancement

## 1.2.2

### Bug Fixes

* create tag on master
