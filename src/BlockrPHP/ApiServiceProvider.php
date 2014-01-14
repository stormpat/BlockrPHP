<?php

namespace BlockrPHP;
use Guzzle\Http\Client;
use Exception;

class ApiServiceProvider {

    protected $currency;
    protected $base;
    protected $client;
    protected $url = 'blockr.io/';
    protected $version = 'api/v1/';
    protected $confirmations = '?confirmations=';
    protected $coin = 'coin/info/';
    protected $block = 'block/info/';
    protected $blockTx = 'block/txs/';
    protected $blockRaw = 'block/raw/';
    protected $txInfo = 'tx/info/';
    protected $txInfoRaw = 'tx/raw/';
    protected $address = 'address/info/';
    protected $balance = 'address/balance/';
    protected $addressTx = 'address/txs/';
    protected $addressUnspent = 'address/unspent/';

    public function __construct($currency)
    {
        if (in_array(strtolower($currency), array('bitcoin', 'litecoin', 'digitalcoin'))) {
            $this->currency = $currency;
            $this->client = new Client($this->url());
        }
        else
        {
            throw new Exception('Only Bitcoin, Litecoin and Digitalcoin are supported.');
        }
    }

    public function request($params, $block)
    {
        $response = $this->client->get($params . $block)->send()->getBody();
        return json_decode($response);
    }

    public function url()
    {
        if (strtolower($this->currency) === 'bitcoin')
        {
            $this->base = '';
        }
        if (strtolower($this->currency) === 'litecoin')
        {
            $this->base = 'ltc.';
        }
        if (strtolower($this->currency) === 'digitalcoin')
        {
            $this->base = 'dgc.';
        }
        return strtolower('http://' . $this->base . $this->url . $this->version);
    }

}