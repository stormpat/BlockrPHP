<?php namespace BlockrPHP;

use Guzzle\Http\Client;
use Exception;

/**
 * Class ApiServiceProvider
 * @package BlockrPHP
 */
class ApiServiceProvider {

    /**
     *
     * @var
     */
    protected $currency;
    /**
     * @var
     */
    protected $base;
    /**
     * @var \Guzzle\Http\Client
     */
    protected $client;
    /**
     * @var string
     */
    protected $url = 'blockr.io/';
    /**
     * @var string
     */
    protected $version = 'api/v1/';
    /**
     * @var string
     */
    protected $confirmations = '?confirmations=';
    /**
     * @var string
     */
    protected $coin = 'coin/info/';
    /**
     * @var string
     */
    protected $block = 'block/info/';
    /**
     * @var string
     */
    protected $blockTx = 'block/txs/';
    /**
     * @var string
     */
    protected $blockRaw = 'block/raw/';
    /**
     * @var string
     */
    protected $txInfo = 'tx/info/';
    /**
     * @var string
     */
    protected $txInfoRaw = 'tx/raw/';
    /**
     * @var string
     */
    protected $address = 'address/info/';
    /**
     * @var string
     */
    protected $balance = 'address/balance/';
    /**
     * @var string
     */
    protected $addressTx = 'address/txs/';
    /**
     * @var string
     */
    protected $addressUnspent = 'address/unspent/';

    /**
     * Set the base currency. Also se the base uri for API requests.
     * @param $currency
     */
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

    /**
     * The main query method for all requests.
     * @param $params
     * @param $block
     * @return mixed
     */
    public function request($params, $block)
    {
        $response = $this->client->get($params . $block)->send()->getBody();
        return json_decode($response);
    }

    /**
     * Build the base uri for all API requests.
     * @return string
     */
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