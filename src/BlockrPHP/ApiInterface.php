<?php

namespace BlockrPHP;

interface ApiInterface {

    public function coinInfo();
    public function blockInfo($block);
    public function blockTx($block);
    public function blockRaw($block);
    public function transaction($transaction);
    public function transactionRaw($transaction);
    public function address($address, $confirmations);
    public function balance($address, $confirmations);
    public function addressTx($address);
    public function addressUnspent($address);
}