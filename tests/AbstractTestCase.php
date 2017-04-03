<?php

namespace Artesaos\Moip\Tests;

use Artesaos\Moip\Moip;
use Moip\Moip as Api;
use Moip\MoipBasicAuth;
use PHPUnit_Framework_TestCase;

/**
 * Class MoipTestCase.
 *
 * @package Artesaos\Moip\Tests
 */
abstract class AbstractTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @const string
     */
    const MOIP_KEY = 'ABABABABABABABABABABABABABABABABABABABAB';

    /**
     * @const string
     */
    const MOIP_TOKEN = '01010101010101010101010101010101';

    /**
     * @var \Moip\Moip
     */
    protected $moip;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        $this->moip = new Moip(new Api(new MoipBasicAuth(self::MOIP_KEY, self::MOIP_TOKEN), false));
    }
}