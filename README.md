# PHP Objects

Primitive types behaving like grown up objects. Compatible with PHP 5.3.3+

[![Build Status](https://travis-ci.org/mjacobus/php-objects.png?branch=master)](https://travis-ci.org/mjacobus/php-objects)
[![Coverage Status](https://coveralls.io/repos/mjacobus/php-objects/badge.png)](https://coveralls.io/r/mjacobus/php-objects)

Once you've written some ruby code and you HAVE to write php, you miss the
hell out off ruby objects.

Well, not anymore. Hopefully.

- [PO\Object](docs/Object.md)
- [PO\Hash](docs/Hash.md) - There are tons of contribuitions you can make here
- [PO\String](docs/String.md) - And here!


## Lincense
[MIT](MIT-LICENSE)

## Authors

- [Marcelo Jacobus](https://github.com/mjacobus)


## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request

**Do not forget to write tests**

**Keep the code standard [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)

**Keep the code coverage [![Coverage Status](https://coveralls.io/repos/mjacobus/php-objects/badge.png)](https://coveralls.io/r/mjacobus/php-objects)**
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
