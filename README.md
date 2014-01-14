#BlockrPHP

###Hightlights

- Support for Bitcoin, Litecoin & Digitalcoin
- Simple and easy API.
- Easy integration with other projects and frameworks.

###Requirements

- PHP >=5.3.3
- [curl extension](php.net/curl)

###About

Easily get data from the diffrent blockchains. Support for Blocks, addresses
and transactions.

###Installation

**Composer**
```javascript

// in composer.json

"require": {
    "gkunno/blockr-php": "dev-master"
}

// from command line

composer require gkunno/blockr-php:dev-master

```

**Setup**
```php
require_once __DIR__ . '/vendor/autoload.php';

use BlockrPHP\Api;

$coin = new Api('Litecoin');
```

Now you can call methods on the ```$coin```instance.

###Documentation

First choose your currency. When you create the object tell the ```Api``` class
what currency you want to use.

Available currencies are ```Bitcoin, Litecoin and Digitalcoin```

```php

// create new instance with Litecoin.
$coin = new Api('Litecoin');

```

To get data faster (reducing HTTP calls) you can chain query params in one call. So if you want information about the
addresses (just grabbed these from the blockchain randomly) ```LTrRaX2KMN27cigK9QiCmJGk3qYww45ahn```
and ```LUZp5GbpxfwykA6PieSApkhAyRbPeyE6KE``` you can chain them togheter.

```php

// chain two addresses and get data in a single http call.
$coin->address('LTrRaX2KMN27cigK9QiCmJGk3qYww45ahn, LUZp5GbpxfwykA6PieSApkhAyRbPeyE6KE');

```

**Methods**

```$coin->coinInfo()```

Gives you information about the currency, Basic coin information with coin name, abbreviation,
logo and homepage URL volume - Volume information: how many coins are in supply and how many coins will there ever be
last_block - Information about the last block in the longest chain.
next_difficulty - When will next difficulty be retargeted and how big it will probably be.

```$coin->blockInfo($block)```

Where ```$block``` can be a integer (eg: 223212). To get the latest block info pass in the string ```last``` - this will always return the latest block information.

```$coin->blockTx($block)```

Returns short info about all transactions in given block.

```$coin->blockRaw($block)```

Returns raw block data in the bitcoind format.

```$coin->transaction($transaction)```

Returns transaction data. Some fields are normalized - 'vin' is presented as an address and not as a previous transaction hash. 'vins' and 'vouts' present actual traded value, not whole transaction amounts. If you need exact transaction presentation, use raw api call.

```$coin->transactionRaw($transaction)```

Will return raw data for given transaction

```$coin->address($address)```

Returns basic address data, date, block and transaction when this address first appeared and last transaction data.

```$coin->address($address, 10)```

Optional parameter for confirmations. Must be a integer.

If set, API will include only those transactions that have this number of confirmations. If for example an address gets 10 coins in some transaction in the last block and if you set confirmations = 2 then this last transaction will not be included in balance.

If there are 6 or more confirmations of transaction then the transaction is assumed to be as safe (valid).

```$coin->balance($balance)```

This api call can be used to fast request only address balance. You can add multiple addresses to api call.

```$coin->balance($balance, 10)```

Add number of confirmations.


```$coin->addressTx($address)```

Returns transactions for given address. Only the most recent 200 transactions are shown. If you need more, contact us. You can add multiple addresses to api call.

```$coin->addressUnspent($address)```

Returns unspent transactions for given address. Unspent transactions are transactions that still have value. Value of these transactions hasn't been spent yet. You can add multiple addresses to api call.

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

###Read

Remeber to also check out the [Blockr docs](blockr.io/documentation/api)