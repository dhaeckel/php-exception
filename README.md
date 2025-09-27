# Haeckel/php-exception

Haeckel/php-exception is php library that provides utilities and extensions for exceptions.

## Features

- [Utilities](src/Util) to make working with exceptions easier:
    - [MessageProvider](src/Util/MsgProvider.php): Provide common exception message templates to
    have consistent exception messages.

- Extensions:
    - [LogCtxAware](src/LogCtxAware): Exceptions that contain an array, to capture the context when
    the exception is thrown. This context can then be passed to a psr/log compatible logger.

## Installation

Install the package vai composer by running:

```sh
$ composer require haeckel/exception
```

## Contribute

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

- Source Code: github.com/$project/$project

## Support

Let us know if you have issues.
- Issue Tracker: github.com/$project/$project/issues

## License

[LGPL-3.0-or-later](COPYING.LESSER)
