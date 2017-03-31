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
        $this->assertEquals($this->moip, $this->moip->start());
    }
}