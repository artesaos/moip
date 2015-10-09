<?php

namespace Artesaos\Moip\Tests;

use Artesaos\Moip\Moip;
use Illuminate\Contracts\Foundation\Application;
use Mockery as m;
use PHPUnit_Framework_TestCase as TestCase;

abstract class MoipTestCase extends TestCase
{
	/**
	 * Instance Moip class.
	 * 
	 * @var \Moip\Moip
	 **/
	protected $moip;

	/**
	 * Create a new instace.
	 * 
	 * @param  \Moip\Moip   $moip
	 */
	public function setUp()
	{
		$this->moip = new Moip(m::mock(Application::class));
	}

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     */
	public function tearDown()
	{
		m::close();
	}
}