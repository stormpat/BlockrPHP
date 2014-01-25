<?php namespace BlockrPHP;

use Exception;
use BlockrPHP\ApiInterface;

/**
 * Class Api
 * @package BlockrPHP
 */
class Api extends ApiServiceProvider implements ApiInterface {

    /**
     * Setup the currency, and the base uri.
     * @param $currency
     */
    public function __construct($currency)
    {
        parent::__construct($currency);
    }


    /**
     * Get information about the chosen currency.
     * @return mixed
     */
    public function coinInfo()
    {
        return $this->request($this->coin, null);
    }

    /**
     * Get information about the current block in the blockchain.
     * @param $block
     * @return mixed
     */
    public function blockInfo($block)
    {
        return $this->request($this->block, $block);
    }

    /**
     * Get information about the current blocks transactions.
     * @param $block
     * @return mixed
     */
    public function blockTx($block)
    {
        return $this->request($this->blockTx, $block);
    }

    /**
     * Get the raw bitcoind format for a block.
     * @param $block
     * @return mixed
     */
    public function blockRaw($block)
    {
        return $this->request($this->blockRaw, $block);
    }

    /**
     * Get information about a transaction.
     * @param $transaction
     * @return mixed
     */
    public function transaction($transaction)
    {
        return $this->request($this->txInfo, $transaction);
    }

    /**
     * Get the raw bitcoind format for a transaction.
     * @param $transaction
     * @return mixed
     */
    public function transactionRaw($transaction)
    {
        return $this->request($this->txInfoRaw, $transaction);
    }

    /**
     * Get information about a address.
     * @param $address
     * @param null $confirmations
     * @return mixed
     * @throws \Exception
     */
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

    /**
     * Get the current balance of an address.
     * @param $address
     * @param null $confirmations
     * @return mixed
     * @throws \Exception
     */
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

    /**
     * Get transactions for a specific address.
     * @param $address
     * @return mixed
     */
    public function addressTx($address)
    {
        return $this->request($this->addressTx, $address);
    }

    /**
     * Get the amount of unspent currency in the address.
     * @param $address
     * @return mixed
     */
    public function addressUnspent($address)
    {
        return $this->request($this->addressUnspent, $address);
    }


}