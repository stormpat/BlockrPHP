<?php namespace BlockrPHP\Test;

use BlockrPHP\Api;
use BlockrPHP\ApiServiceProvider;

class ApiTest extends \PHPUnit_Framework_TestCase {

    public $bitcoin;
    public $litecoin;
    public $digitalcoin;

    public function __construct()
    {
        $this->bitcoin = new Api('bitcoin');
        $this->litecoin = new Api('litecoin');
        $this->digitalcoin = new Api('digitalcoin');
    }

    public function testApiClassConstructorBitCoin()
    {
        $this->assertInstanceOf('BlockrPHP\Api', $this->bitcoin);
    }
    public function testApiClassConstructorLiteCoin()
    {
        $this->assertInstanceOf('BlockrPHP\Api', $this->litecoin);
    }
    public function testApiClassConstructorDigitalCoin()
    {
        $this->assertInstanceOf('BlockrPHP\Api', $this->digitalcoin);
    }
    public function testCoinInfo()
    {
        $this->assertEquals($this->bitcoin->coinInfo()->data->coin->name, 'Bitcoin');
        $this->assertEquals($this->litecoin->coinInfo()->data->coin->name, 'Litecoin');
        $this->assertEquals($this->digitalcoin->coinInfo()->data->coin->name, 'Digitalcoin');
    }

    public function testUrlbuilder()
    {
        $this->assertEquals($this->bitcoin->url(), 'http://blockr.io/api/v1/');
        $this->assertEquals($this->litecoin->url(), 'http://ltc.blockr.io/api/v1/');
        $this->assertEquals($this->digitalcoin->url(), 'http://dgc.blockr.io/api/v1/');
    }

}