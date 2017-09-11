# LogPusher: Log tracking for PHP

[![Build Status](https://travis-ci.org/LogPusher/logpusher-php.svg?branch=master)](https://travis-ci.org/LogPusher/logpusher-php.svg?branch=master)


LogPusher is a system that allows you to receive notifications through your mobile on a single application. Apart from push notifications, you can also receive information without a mobile client via SMS and Mail service. You can integrate with any software through the API. Thanks to rapid API integration, you do not spend extra time for information and mail service. 

LogPusher is easy to use on the client side thanks to its simple interface. Just generate API key trough our control panel and you are ready to go.

## Features

* Send log data

## Getting started

1. [Create a LogPusher account](http://logpusher.com/)
2. Create a new App and get API Token

## Installation

```
composer require logpusher/logpusher-php
```

## Usage

```php
$pusher = new \LogPusher\LogPusherClient(
    new \GuzzleHttp\Client([]),
    'hello@logpusher.com',
    'PASSWORD',
    'API_KEY'
);
```

```php
$pusher->push(
    'My awesome log message', 
    'myawesomesite.com', 
    'E-commerce', 
    'Notice', 
    date('H:i'), 
    new \DateTime('now'), 
    '1'
);
```

## Support

* [Search open and closed issues](https://github.com/logpusher/logpusher-php/issues?utf8=✓&q=is%3Aissue) for similar problems
* [Report a bug or request a feature](https://github.com/logpusher/logpusher-php/issues/new)


## Contributing

All contributors are welcome! Feel free to comment on [existing issues](https://github.com/logpusher/logpusher-php/issues) for clarification or starting points.

## The MIT License (MIT)

Copyright © 2017 [LogPusher](http://logpusher.com/)

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the “Software”), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
