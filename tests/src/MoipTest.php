<?php

namespace Artesaos\Moip\Tests;

/**
 * Class MoipTest.
 *
 * @package Artesaos\Moip\Tests
 */
class MoipTest extends AbstractTestCase
{
    /**
     * @test
     */
    public function testStart()
    {
        $this->assertInstanceOf(\Artesaos\Moip\Moip::class, $this->moip->start());
    }

    /**
     * @test
     */
    public function testPropertyMoip()
    {
        $this->assertInstanceOf(\Moip\Moip::class, $this->moip->getApi());
    }

    /**
     * @test
     */
    public function testInstanceOfCustomers()
    {
        $this->assertInstanceOf(\Moip\Resource\Customer::class, $this->moip->customers());
    }

    /**
     * @test
     */
    public function testInstanceOfEntries()
    {
        $this->assertInstanceOf(\Moip\Resource\Entry::class, $this->moip->entries());
    }

    /**
     * @test
     */
    public function testInstanceOfOrders()
    {
        $this->assertInstanceOf(\Moip\Resource\Orders::class, $this->moip->orders());
    }

    /**
     * @test
     */
    public function testInstanceOfPayments()
    {
        $this->assertInstanceOf(\Moip\Resource\Payment::class, $this->moip->payments());
    }

    /**
     * @test
     */
    public function testInstanceOfMultiOrders()
    {
        $this->assertInstanceOf(\Moip\Resource\Multiorders::class, $this->moip->multiorders());
    }
}