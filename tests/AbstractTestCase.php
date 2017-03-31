<?php

namespace Artesaos\Moip\Tests;

use Artesaos\Moip\Moip;
use Moip\Moip as Api;
use Mockery;
use PHPUnit_Framework_TestCase;

/**
 * Class MoipTestCase.
 *
 * @package Artesaos\Moip\Tests
 */
abstract class AbstractTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Moip\Moip
     */
    protected $moip;

    /**
     * @var \Mockery
     */
    protected $mock;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->mock = new Mockery();
        $this->moip = new Moip($this->mock->mock(Api::class));
    }
}