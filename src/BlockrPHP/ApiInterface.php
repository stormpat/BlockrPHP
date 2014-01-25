<?php namespace BlockrPHP;

/**
 * Interface ApiInterface
 * @package BlockrPHP
 */
interface ApiInterface {

    /**
     * @return mixed
     */
    public function coinInfo();

    /**
     * @param $block
     * @return mixed
     */
    public function blockInfo($block);

    /**
     * @param $block
     * @return mixed
     */
    public function blockTx($block);

    /**
     * @param $block
     * @return mixed
     */
    public function blockRaw($block);

    /**
     * @param $transaction
     * @return mixed
     */
    public function transaction($transaction);

    /**
     * @param $transaction
     * @return mixed
     */
    public function transactionRaw($transaction);

    /**
     * @param $address
     * @param $confirmations
     * @return mixed
     */
    public function address($address, $confirmations);

    /**
     * @param $address
     * @param $confirmations
     * @return mixed
     */
    public function balance($address, $confirmations);

    /**
     * @param $address
     * @return mixed
     */
    public function addressTx($address);

    /**
     * @param $address
     * @return mixed
     */
    public function addressUnspent($address);
}