#BlockrPHP

###Hightlights

- Support for Bitcoin, Litecoin & Digitalcoin
- Simple and easy API.
- Easy integration with other projects and frameworks.

###Requirements

- PHP >=5.3.3
- [The curl extension](php.net/curl)

###About

Easily get data from the diffrent blockchains. Support for Blocks, addresses
and transactions.

###Installation

```php
require_once __DIR__ . '/vendor/autoload.php';

use BlockrPHP\Api;

$coin = new Api('Litecoin');
```

Now you can call methods on the ```$coin```instance.

###Documentation

@todo asap :)

###Licence

The MIT License (MIT)

Copyright (c) 2014 Patrik Storm

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.