<?php

namespace Artesaos\Moip\Tests;

/**
 * Class MoipTest.
 *
 * @package Artesaos\Moip\Tests
 */
class MoipTest extends AbstractTestCase
{
    public function testStart()
    {
        $this->assertInstanceOf(\Artesaos\Moip\Moip::class, $this->moip->start());
    }

    public function testPropertyMoip()
    {
        $this->assertInstanceOf(\Moip\Moip::class, $this->moip->getApi());
    }

    public function testInstanceOfAccount()
    {
        $this->assertInstanceOf(\Moip\Resource\Account::class, $this->moip->accounts());
    }

    public function testInstanceOfCustomers()
    {
        $this->assertInstanceOf(\Moip\Resource\Customer::class, $this->moip->customers());
    }

    public function testInstanceOfEntries()
    {
        $this->assertInstanceOf(\Moip\Resource\Entry::class, $this->moip->entries());
    }

    public function testInstanceOfOrders()
    {
        $this->assertInstanceOf(\Moip\Resource\Orders::class, $this->moip->orders());
    }

    public function testInstanceOfPayments()
    {
        $this->assertInstanceOf(\Moip\Resource\Payment::class, $this->moip->payments());
    }

    public function testInstanceOfMultiOrders()
    {
        $this->assertInstanceOf(\Moip\Resource\Multiorders::class, $this->moip->multiorders());
    }

    public function testInstanceOfNotifications()
    {
        $this->assertInstanceOf(\Moip\Resource\NotificationPreferences::class, $this->moip->notifications());
    }

    public function testeInstanceOfTranfers()
    {
        $this->assertInstanceOf(\Moip\Resource\Transfers::class, $this->moip->transfers());
    }
}