# PHP Core

Primitive types behaving like grown up objects. Compatible with PHP 5.3.3+

Code information:

[![Build Status](https://travis-ci.org/koinephp/Core.png?branch=master)](https://travis-ci.org/koinephp/Core)
[![Coverage Status](https://coveralls.io/repos/koinephp/Core/badge.png?branch=master)](https://coveralls.io/r/koinephp/Core?branch=master)
[![Code Climate](https://codeclimate.com/github/koinephp/Core.png)](https://codeclimate.com/github/koinephp/Core)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/koinephp/Core/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/koinephp/Core/?branch=master)

Package information:

[![Latest Stable Version](https://poser.pugx.org/koine/core/v/stable.svg)](https://packagist.org/packages/koine/core)
[![Total Downloads](https://poser.pugx.org/koine/core/downloads.svg)](https://packagist.org/packages/koine/core)
[![Latest Unstable Version](https://poser.pugx.org/koine/core/v/unstable.svg)](https://packagist.org/packages/koine/core)
[![License](https://poser.pugx.org/koine/core/license.svg)](https://packagist.org/packages/koine/core)

Once you've written some ruby code and you HAVE to write php, you miss the
hell out off ruby objects.

Well, not anymore. Hopefully.

- [Koine\Object](docs/Object.md)
- [Koine\Hash](docs/Hash.md) - There are tons of contribuitions you can make here
- [Koine\String](docs/String.md) - And here!
- [Koine\ArrayReference](docs/ArrayReference.md) - And here!

## Installing

### Installing via Composer
Append the lib to your requirements key in your composer.json.

```javascript
{
    // composer.json
    // [..]
    require: {
        // append this line to your requirements
        "koine/core": "0.9.*"
    }
}
```

### Alternative install
- Learn [composer](https://getcomposer.org). You should not be looking for an alternative install. It is worth the time. Trust me ;-)
- Follow [this set of instructions](#installing-via-composer)

## Issues/Features proposals

[Here](https://github.com/koinephp/Core/issues) is the issue tracker.

## Contributing

Only TDD code will be accepted. Please follow the [PSR-2 code standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md).

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request

### How to run the tests:

```bash
phpunit --configuration tests/phpunit.xml
```

### To check the code standard run:

```bash
phpcs --standard=PSR2 lib
phpcs --standard=PSR2 tests

# alternatively

./bin/travis/run_phpcs.sh
```

## Lincense
[MIT](MIT-LICENSE)

## Authors

- [Marcelo Jacobus](https://github.com/mjacobus)
