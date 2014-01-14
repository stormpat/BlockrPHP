<?php

namespace BlockrPHP;

use Exception;
use Guzzle\Http\Client;

class Api {

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

    public function request($params, $block)
    {
        $response = $this->client->get($params . $block)->send()->getBody();
        return json_decode($response);
    }

    public function coinInfo()
    {
        return $this->request($this->coin, null);
    }

    public function blockInfo($block)
    {
        return $this->request($this->block, $block);
    }

    public function blockTx($block)
    {
        return $this->request($this->blockTx, $block);
    }

    public function blockRaw($block)
    {
        return $this->request($this->blockRaw, $block);
    }

    public function transaction($transaction)
    {
        return $this->request($this->txInfo, $transaction);
    }

    public function transactionRaw($transaction)
    {
        return $this->request($this->txInfoRaw, $transaction);
    }

    public function address($address, $confirmations = null)
    {
        if ($confirmations !== null)
        {
            if (!is_int($confirmations))
            {
                throw new Exception("Please enter a valid integer for the confirmation value");
            }
            else
            {
                $confirmations = $this->confirmations . $confirmations;
            }
        }
        return $this->request($this->address, $address . $confirmations);
    }

    public function balance($address, $confirmations = null)
    {
        if ($confirmations !== null)
        {
            if (!is_int($confirmations))
            {
                throw new Exception("Please enter a valid integer for the confirmation value");
            }
            else
            {
                $confirmations = $this->confirmations . $confirmations;
            }
        }
        return $this->request($this->balance, $address . $confirmations);
    }

    public function addressTx($address)
    {
        return $this->request($this->addressTx, $address);
    }

    public function addressUnspent($address)
    {
        return $this->request($this->addressUnspent, $address);
    }


}