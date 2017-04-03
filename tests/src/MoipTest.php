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
}